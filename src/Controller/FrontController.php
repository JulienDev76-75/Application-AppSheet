<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pass;
use App\Form\PassFormType;
use App\Repository\PassRepository;
use App\Entity\Rig;
use App\Form\RigFormType;
use App\Repository\RigRepository;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Entity\PlanCommunication;
use App\Form\PlanCommunicationFormType;
use App\Repository\PlanCommunicationRepository;
use App\Entity\Satisfaction;
use App\Form\SatisfactionType;
use App\Repository\SatisfactionRepository;
use App\Entity\Sites;
use App\Form\SiteType;
use App\Repository\SitesRepository;
use App\Entity\Swot;
use App\Form\SwotType;
use App\Repository\SwotRepository;
use App\Entity\CartesCadeaux;
use App\Form\CartesCadeauxFormType;
use App\Repository\CartesCadeauxRepository;
use App\Form\SearchSwotType;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Bundle\FrameworkBundle\Controller\RedirectController;
use Symfony\Component\HttpFoundation\JsonResponse;

class FrontController extends AbstractController
{

    //
    // ******************* DASHBOARD PAGES **********************
    //

    /**
     * @Route("/DGdashboard", name="DGdashboard")
     */
    public function index(Request $request): Response
    {
        return $this->render('dg/index.html.twig', [
            'controller_name' => 'DgController',
        ]);
    }

    /**
     * @Route("/DGdashboard/swot", name="swot")
     */
    public function swot(Request $request, SwotRepository $swotRepo, UserRepository $userRepo): Response
    {   
        $form = $this->createForm(SearchSwotType::class);
        $search = $form->handleRequest($request);

        // Recherche des annonces correspondant aux mots clés
        $swot = $swotRepo->search($search->get('mots')->getData());
        
        $swotRepo = $this->getDoctrine()->getRepository(Swot::class);
        $swotList = $swotRepo -> findBy(
            ['user' => $this->getUser()],
        ); 

        $swotRepo = $this->getDoctrine()->getRepository(Swot::class);
        $swotDG = $swotRepo -> findAll();
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $userDG = $userRepo -> findAll();
 
    return $this->render('dg/swot.html.twig', [
        'swot' => $swot,
        'form' => $form->createView(),
        'swotList' => $swotList,
        'swotDG' => $swotDG,
        'userDG' => $userDG,
    ]);
    }

    /**
     * @Route("/DGdashboard/satisfaction", name="satisfaction")
     */
    public function satisfaction(): Response
    {

    return $this->render('dg/satisfaction.html.twig', [
        'controller_name' => 'DgController',
    ]);
    }

    /**
     * @Route("/DGdashboard/carteCadeau", name="carteCadeau")
     */
    public function carteCadeau(CartesCadeauxRepository $cartesRepo, SitesRepository $siteRepo): Response
    {
        // Données de la bdd pour la graphique
        $cartescadeaux = $cartesRepo->findBy(
            ['user' => $this->getUser()],
        );

        $dates = [];
        $cartesvendues = [];

        foreach($cartescadeaux as $cartecadeau) {
            $dates[]= $cartecadeau ->getDate();
            $cartesvendues[] = $cartecadeau ->getNombreCartesVendues();
        }

        //données de la bdd pour le tableau - RAPPEL - tri par site et par dates des cartes cadeaux et par date
        $cartesCadeauxTableau = $cartesRepo->findBy(
            ['user' => $this->getUser(),
            ],
            ['date' => 'ASC']
        );  

    return $this->render('dg/carteCadeau.html.twig', [
        'dates' => json_encode($dates),
        'cartesvendues' => json_encode($cartesvendues),
        'cartesCadeauxTableau' => $cartesCadeauxTableau,
    ]);
    }

    /**
     * @Route("/DGdashboard/planCommunication", name="planCommunication")
     */
    public function planCommunication(): Response
    {
    return $this->render('dg/planCommunication.html.twig', [
        'controller_name' => 'DgController',
    ]);
    }

    /**
     * @Route("/DGdashboard/pass", name="pass")
     */
    public function pass(): Response
    {
        $sitesRepo = $this->getDoctrine()->getRepository(CartesCadeaux::class);
        $sites = $sitesRepo ->findby(
            ['dr' => $this->getUser()],
            ['site' => 'ASC'],
        );  
        
    return $this->render('dg/pass.html.twig', [
        'sites' => $sites,
    ]);
    }

    /**
     * @Route("/DGdashboard/frequentation&CA", name="frequentation")
     */
    public function freq(): Response
    {
    return $this->render('dg/frequentation.html.twig', [
        'controller_name' => 'DgController',
    ]);
    }

    /**
     * @Route("/DGdashboard/listeDesSites/{id}", name="singleSite", requirements={"id"="\d+"})
     */
    public function singleSite(int $id, SitesRepository $sitesRepo): Response
    {
        $sitesRepo = $this->getDoctrine()->getRepository(Sites::class);
        $sites = $sitesRepo->find($id);

        return $this->render('dg/singleSite.html.twig', [
            'sites' => $sites,
        ]);
    }

    /**
     * @Route("/DGdashboard/listeDesSites", name="listeDesSites")
     */
    public function sites(Request $request, SitesRepository $sitesRepo, UserRepository $userRepo): Response
    {

        //ROLE_DR
        $sitesRepo = $this->getDoctrine()->getRepository(Sites::class);
        $sites = $sitesRepo -> findby(
            ['user' => $this->getUser()],
            ['ville' => 'ASC'],
        );  

        //ROLE_DG
        $sitesRepo = $this->getDoctrine()->getRepository(Sites::class);
        $sites = $sitesRepo -> findby(
            ['user' => $this->getUser()],
        );  
        $userRepo = $this->getDoctrine()->getRepository(User::class);
        $sitesDG = $userRepo -> findby(
            ['prenom_nom' => $this->getUser()],
        );  

        // (console.log) sur $filters à faire
        $filters = $request->get("sites");
        // On vérifie si on a une requête AJAX
            if ($request->get('ajax')){
        // render des données en Json
                return new JsonResponse([
                    $this->renderView('dg/listeDesSites.html.twig', [
                    'sites' => $sites,
                    ])
                ]);
            }

    return $this->render('dg/listeDesSites.html.twig', [
        'sites' => $sites,
        'sitesDG' => $sitesDG,
    ]);
    }

    /**
     * @Route("/DGdashboard/coutCommunication", name="coutCommunication")
     */
    public function coutCommunication(): Response
    {
    return $this->render('dg/coutCommunication.html.twig', [
        'controller_name' => 'DgController',
    ]);
    }

    //
    // ********************** FORMULAIRE : ADD ELEMENTS **********************
    //

    /**
     * @Route("/DGdashboard/nouveauSite", name="nouveauSite")
     */
    public function newSite(Request $request): Response
    {
        $site = new Sites();
        $form = $this->createForm(SiteType::class, $site);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $site->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($site);
            $entityManager->flush();
            $this->addFlash(
                "success",
                "Votre projet a bien été ouvert, vous n'avez plus qu'à mettre vos premières tâches afin d'atteindre vos objectifs ! :)"
            );
            return $this->redirectToRoute('DGdashboard');
        }

        return $this->render('registration/newSite.html.twig', [
            'form' => $form->createView()
         ]);
    }

    /**
     * @Route("/DGdashboard/nouveauSwot", name="nouveauSwot")
     */
    public function newSwot(Request $request): Response
    {
        $swot = new Swot();
        $form = $this->createForm(SwotType::class, $swot);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $swot->setUser($this->getUser());
            $swot->setActive(1);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($swot);
            $entityManager->flush();

             $this->addFlash(
                 "success",
                "Votre carte cadeau a bien été créée, vous n'avez plus qu'à rentrer les valeurs ! :)"
            );

            return $this->redirectToRoute('swot');
        }

        return $this->render('registration/newSwot.html.twig', [
            'form' => $form->createView()
         ]);
    }

    /**
     * @Route("/DGdashboard/listeDesSites/{id}/newCartesCadeaux", name="newCartesCadeaux", requirements={"id"="\d+"})
     */
    public function newcartescadeaux(Request $request, SitesRepository $sitesRepo, int $id): Response
    {
        $cadeaux = new CartesCadeaux();
        $form = $this->createForm(CartesCadeauxFormType::class, $cadeaux);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sites = $sitesRepo->find($id);
            $cadeaux->setSite($sites);
            $cadeaux->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cadeaux);
            $entityManager->flush();


            $this->addFlash(
                "success",
                "Votre projet a bien été ouvert, vous n'avez plus qu'à mettre vos premières tâches afin d'atteindre vos objectifs ! :)"
            );

            return $this->redirectToRoute('listeDesSites');
        }

        return $this->render('registration/newCartesCadeaux.html.twig', [
            'form' => $form->createView()
         ]);
    }

    /**
    * @Route("/DGdashboard/listeDesSites/{id}/newPlanCommunication", name="newPlanCommunication", requirements={"id"="\d+"})
    */
    public function newPlanCommunication(Request $request, SitesRepository $sitesRepo, int $id): Response
    {
        $planCom = new PlanCommunication();
        $form = $this->createForm(PlanComFormType::class, $planCom);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sites = $sitesRepo->find($id);
            $planCom->setSite($sites);
            $planCom->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($planCom);
            $entityManager->flush();

            $this->addFlash(
                "success",
                "Votre projet a bien été ouvert, vous n'avez plus qu'à mettre vos premières tâches afin d'atteindre vos objectifs ! :)"
            );

            return $this->redirectToRoute('planCommunication');
        }

        return $this->render('registration/newPlanCommunication.html.twig', [
            'form' => $form->createView()
         ]);
    }

    /**
    * @Route("/DGdashboard/listeDesSites/{id}/newSatisfaction", name="newSatisfaction", requirements={"id"="\d+"})
    */
    public function newSatisfaction(Request $request, SitesRepository $sitesRepo, int $id): Response
    {
        $satisfaction = new Satisfaction();
        $form = $this->createForm(SatisfactionType::class, $satisfaction);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sites = $sitesRepo->find($id);
            $satisfaction->setSite($sites);
            $satisfaction->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($satisfaction);
            $entityManager->flush();

            $this->addFlash(
                "success",
                "Votre projet a bien été ajoutée votre site, vous n'avez plus qu'à mettre vos premières tâches afin d'atteindre vos objectifs ! :)"
            );

            return $this->redirectToRoute('Satisfaction');
        }

        return $this->render('registration/newSatisfaction.html.twig', [
            'form' => $form->createView()
         ]);
    }

    /**
    * @Route("/DGdashboard/listeDesSites/{id}/newRig", name="newRig", requirements={"id"="\d+"})
    */
    public function newRig(Request $request, RigRepository $rigRepo, int $id): Response
    {
        $rig = new Rig();
        $form = $this->createForm(RigFormType::class, $rig);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $rig = $rigRepo->find($id);
            $rig->setSite($rig);
            $rig->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rig);
            $entityManager->flush();

            $this->addFlash(
                "success",
                "Votre projet a bien été ajoutée votre site, vous n'avez plus qu'à mettre vos premières tâches afin d'atteindre vos objectifs ! :)"
            );

            return $this->redirectToRoute('Rig');
        }

        return $this->render('registration/newSatisfaction.html.twig', [
            'form' => $form->createView()
         ]);
    }

    /**
    * @Route("/DGdashboard/listeDesSites/{id}/newPass", name="newPass", requirements={"id"="\d+"})
    */
    public function newPass(Request $request, PassRepository $passRepo, int $id): Response
    {
        $pass = new Pass();
        $form = $this->createForm(PassFormType::class, $pass);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $rig = $passRepo->find($id);
            $rig->setSite($rig);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rig);
            $entityManager->flush();

            $this->addFlash(
                "success",
                "Votre projet a bien été ajoutée votre site, vous n'avez plus qu'à mettre vos premières tâches afin d'atteindre vos objectifs ! :)"
            );

            return $this->redirectToRoute('Rig');
        }

        return $this->render('registration/newSatisfaction.html.twig', [
            'form' => $form->createView()
         ]);
    }


    //
    // ********************** FORMULAIRE : EDIT ELEMENTS **********************
    //

    /**
     * @Route("/DGdashboard/swot/{id}/editSwot", name="editSwot")
     */
    public function editSwot(Swot $swot, Request $request) : Response {
        $form = $this->createForm(SwotType::class, $swot);
        $form->handleRequest($request);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($swot);
        $entityManager->flush();

        return $this->render('edit/editSwot.html.twig', [
            'form' => $form->createView()
         ]);

    }

    /**
     * @Route("/DGdashboard/listeDesSites/{id}/editSites", name="editSites")
     */
    public function editSites(Sites $sites, Request $request) : Response {
        $form = $this->createForm(SiteType::class, $sites);
        $form->handleRequest($request);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($sites);
        $entityManager->flush();

        return $this->render('edit/editSites.html.twig', [
            'form' => $form->createView()
         ]);

    }

    //
    // ********************** FORMULAIRE : DELETE ELEMENTS **********************
    //

    /** 
    * @Route("/DGdashboard/swot/{id}/supprimerSwot", name="supprimerSwot")
    */
    function deleteSwot(Swot $swot): Response {
       $entityManager = $this->getDoctrine()->getManager();
       $entityManager -> remove($swot);
        $entityManager->flush();

        return $this->redirectToRoute('DGdashboard');
    }

    /** 
    * @Route("/DGdashboard//{id}/supprimerCarteCadeau", name="supprimerCarteCadeau")
    */
    function deleteCartesCadeaux(Swot $swot): Response {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager -> remove($swot);
         $entityManager->flush();
 
         return $this->redirectToRoute('DGdashboard');
     }

    /** 
    * @Route("/DGdashboard//{id}/deleteSites", name="deleteSites")
    */
    function deleteSites(Swot $swot): Response {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager -> remove($swot);
        $entityManager->flush();
 
        return $this->redirectToRoute('listeDesSites');
     }

}



