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
use App\Entity\TotalCoutCom;
use App\Form\CartesCadeauxFormType;
use App\Repository\CartesCadeauxRepository;
use App\Form\SearchSwotType;
use App\Repository\TotalCoutComRepository;
use App\Repository\TotalRepository;
use App\Repository\TotalRigRepository;
use Symfony\Bundle\FrameworkBundle\Controller\RedirectController;

class FrontController extends AbstractController
{

    //
    // ******************* DASHBOARD PAGES **********************
    //

    /**
     * @Route("/DGdashboard", name="DGdashboard")
     */
    public function index(): Response
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

        //Données DR
        $swotDR = $swotRepo -> findBy(
            ['user' => $this->getUser()],
        );

        //Données DS
        $swotRepo = $this->getDoctrine()->getRepository(Swot::class);
        $swotDS = $swotRepo -> findOneBy(
            ['user' => $this->getUser()],
        ); 

        //Données DG
        $swotDGS = $swotRepo ->userAndSwot();
        $userDGS = $userRepo ->findAll();

    return $this->render('dg/swot.html.twig', [
        'swot' => $swot,
        'form' => $form->createView(),
        'swotList' => $swotList,
        'swotDR' => $swotDR,
        'swotDS' => $swotDS,
        'swotDGS' => $swotDGS,
        'userDGS' => $userDGS,
    ]);
    }

    /**
     * @Route("/DGdashboard/satisfaction", name="satisfaction")
     */
    public function satisfaction(SatisfactionRepository $satisfactionRepo, SitesRepository $siteRepo, UserRepository $userRepo, TotalRepository $total): Response
    {

        // Données DS
        $trimestre = [];
        $siteduDS = $siteRepo -> findOneBy (
            ['user' => $this->getUser()],
        );

            // FIELD satis_globale
            //foreach($satisglobale2019 as $globale2019) {
            //    $trimestre[]= $globale2019 ->getTrimestre();
            //    $rendusatisglobale2019[] = $globale2019 ->getSatisGlobale();
            //}
    
        // Données DR
        $satisDR = $satisfactionRepo->findBy(
            ['user' => $this->getUser()],
        );
        $sitesDR = $siteRepo->findBy(
            ['user' => $this->getUser()],
        );

        // Données DG
        $userDGS = $userRepo->findAll();
        $sitesDGS = $siteRepo->userAndSites();
        $satisDGS = $satisfactionRepo->sitesAndSatis();
        //findbYannee("2019" pour des graph par année ? Avec graphique multiscale)

        $trimestre = [];
        $satisglobaleDG = $total->trimestreASC();
        foreach($satisglobaleDG as $satisglobale) {
            $trimestre[]= $satisglobale ->getTrimestre();
            $globaleDG[] = $satisglobale ->getSatisGlobale();
            }

        $satistemperatureDG = $total->trimestreASC();
        foreach($satistemperatureDG as $satistemperature) {
            $trimestre[]= $satistemperature ->getTrimestre();
            $temperatureDG[] = $satistemperature ->getTemperatureDouche();
            }

        $satiscomppersoDG = $total->trimestreASC();
        foreach($satiscomppersoDG as $compperso) {
            $trimestre[]= $compperso ->getTrimestre();
            $compDG[] = $compperso ->getCompetencePersonnel();
            }
        
        $satispropreteDG = $total->trimestreASC();
        foreach($satispropreteDG as $proprete) {
            $trimestre[]= $proprete ->getTrimestre();
            $propreteDG[] = $proprete ->getSatisProprete();
            }

        $satishoraireDG = $total->trimestreASC();
        foreach($satishoraireDG as $horaire) {
            $trimestre[]= $horaire ->getTrimestre();
            $horaireDG[] = $horaire ->getSatisProprete();
            }
            

    return $this->render('dg/satisfaction.html.twig', [
        'satisDR' => $satisDR,
        'sitesDR' => $sitesDR,
        'trimestre' => json_encode($trimestre),
        'userDGS' => $userDGS,
        'sitesDGS' => $sitesDGS,
        'satisDGS' => $satisDGS,
        'globaleDG' => json_encode($globaleDG),
        'propreteDG' => json_encode($propreteDG),
        'compDG' => json_encode($compDG),
        'temperatureDG' => json_encode($temperatureDG),
        'horaireDG' => json_encode($horaireDG),
        'trimestre' => json_encode($trimestre),
    ]);
    }

    /**
     * @Route("/DGdashboard/carteCadeau", name="carteCadeau")
     */
    public function carteCadeau(CartesCadeauxRepository $cartesRepo, SitesRepository $siteRepo): Response
    {
        // ************************* DS VIEW *******************************

        $cartescadeauxvendues2017 = $cartesRepo->findByAnnee("2017");
        $cartescadeauxvendues2020 = $cartesRepo->findByAnnee("2020");
        $cartescadeauxvendues2021 = $cartesRepo->findByAnnee("2021");
        $cartescadeauxutilisées2017 = $cartesRepo->findByAnnee("2017");
        $cartescadeauxutilisées2020 = $cartesRepo->findByAnnee("2020");
        $cartescadeauxutilisées2021 = $cartesRepo->findByAnnee("2021");
        $cartescadeauxvalorisationvente2017 = $cartesRepo->findByAnnee("2017");
        $cartescadeauxvalorisationvente2020 = $cartesRepo->findByAnnee("2020");
        $cartescadeauxvalorisationvente2021 = $cartesRepo->findByAnnee("2021");
        $cartescadeauxvalorisationutilisation2017 = $cartesRepo->findByAnnee("2017");
        $cartescadeauxvalorisationutilisation2020 = $cartesRepo->findByAnnee("2020");
        $cartescadeauxvalorisationutilisation2021 = $cartesRepo->findByAnnee("2021");
        $cartescadeauxsolde2017 = $cartesRepo->findByAnnee("2017");
        $cartescadeauxsolde2020 = $cartesRepo->findByAnnee("2020");
        $cartescadeauxsolde2021 = $cartesRepo->findByAnnee("2021");
        $mois = [];
        $cartesvendues = [];

            // FIELD nombre_cartes_vendues
            foreach($cartescadeauxvendues2020 as $cartecadeauvendues2020) {
                $mois[]= $cartecadeauvendues2020 ->getMois();
                $cartesvendues2020[] = $cartecadeauvendues2020 ->getNombreCartesVendues();
            }

            foreach($cartescadeauxvendues2017 as $cartecadeauvendues2017) {
                $mois[]= $cartecadeauvendues2017 ->getMois();
                $cartesvendues2017[] = $cartecadeauvendues2017 ->getNombreCartesVendues();
            }

            foreach($cartescadeauxvendues2021 as $cartecadeauvendues2021) {
                $mois[]= $cartecadeauvendues2021 ->getMois();
                $cartesvendues2021[] = $cartecadeauvendues2021 ->getNombreCartesVendues();
            }

            // FIELD nombre_cartes_utilisées
            foreach($cartescadeauxutilisées2020 as $cartecadeauutilisees2020) {
                $mois[]= $cartecadeauutilisees2020 ->getMois();
                $cartesutilisees2020[] = $cartecadeauutilisees2020 ->getNombreCarteUtilisees();
            }

            foreach($cartescadeauxutilisées2017 as $cartecadeauutilisees2017) {
                $mois[]= $cartecadeauutilisees2017 ->getMois();
                $cartesutilisees2017[] = $cartecadeauutilisees2017 ->getNombreCarteUtilisees();
            }

            foreach($cartescadeauxutilisées2021 as $cartecadeauutilisees2021) {
                $mois[]= $cartecadeauutilisees2021 ->getMois();
                $cartesutilisees2021[] = $cartecadeauutilisees2021 ->getNombreCarteUtilisees();
            }

            // FIELD valorisation_vente
            foreach($cartescadeauxvalorisationvente2017 as $cartecadeauvalorisationvente2017) {
                $mois[]= $cartecadeauvalorisationvente2017 ->getMois();
                $cartesvalovente2017[] = $cartecadeauvalorisationvente2017 ->getValorisationVentes();
            }

            foreach($cartescadeauxvalorisationvente2020 as $cartecadeauvalorisationvente2020) {
                $mois[]= $cartecadeauvalorisationvente2020 ->getMois();
                $cartesvalovente2020[] = $cartecadeauvalorisationvente2020 ->getValorisationVentes();
            }

            foreach($cartescadeauxvalorisationvente2021 as $cartecadeauvalorisationvente2021) {
                $mois[]= $cartecadeauvalorisationvente2021 ->getMois();
                $cartesvalovente2021[] = $cartecadeauvalorisationvente2021 ->getValorisationVentes();
            }

            // FIELD valorisation_utilisation
            foreach($cartescadeauxvalorisationutilisation2017 as $cartecadeauvalorisationutilisation2017) {
                $mois[]= $cartecadeauvalorisationutilisation2017 ->getMois();
                $cartesvaloutilisation2017[] = $cartecadeauvalorisationutilisation2017 ->getValorisationUtilisation();
            }

            foreach($cartescadeauxvalorisationutilisation2020 as $cartecadeauvalorisationutilisation2020) {
                $mois[]= $cartecadeauvalorisationutilisation2020 ->getMois();
                $cartesvaloutilisation2020[] = $cartecadeauvalorisationutilisation2020 ->getValorisationUtilisation();
            }

            foreach($cartescadeauxvalorisationutilisation2021 as $cartecadeauvalorisationutilisation2021) {
                $mois[]= $cartecadeauvalorisationutilisation2021 ->getMois();
                $cartesvaloutilisation2021[] = $cartecadeauvalorisationutilisation2021 ->getValorisationUtilisation();
            }


            // FIELD Solde
            foreach($cartescadeauxsolde2017 as $cartecadeausolde2017) {
                $mois[]= $cartecadeausolde2017 ->getMois();
                $cartessolde2017[] = $cartecadeausolde2017 ->getSolde();
            }

            foreach($cartescadeauxsolde2020 as $cartecadeausolde2020) {
                $mois[]= $cartecadeausolde2020 ->getMois();
                $cartessolde2020[] = $cartecadeausolde2020 ->getSolde();
            }

            foreach($cartescadeauxsolde2021 as $cartecadeausolde2021) {
                $mois[]= $cartecadeausolde2021 ->getMois();
                $cartessolde2021[] = $cartecadeausolde2021 ->getSolde();
            }
        
        // ************************* DG VIEW *******************************
        $cartesDGS = $cartesRepo ->SitesAndCartesCadeaux();
        $sitesDGS = $siteRepo ->findAll();

        
    return $this->render('dg/carteCadeau.html.twig', [
        'mois' => json_encode($mois),
        'cartesvendues' => json_encode($cartesvendues),
        'cartesvendues2020' => json_encode($cartesvendues2020),
        'cartesvendues2021' => json_encode($cartesvendues2021),
        'cartesvendues2017' => json_encode($cartesvendues2017),
        'cartesutilisees2017' => json_encode($cartesutilisees2017),
        'cartesutilisees2020' => json_encode($cartesutilisees2020),
        'cartesutilisees2021' => json_encode($cartesutilisees2021),
        'cartesvalovente2017' => json_encode($cartesvalovente2017),
        'cartesvalovente2020' => json_encode($cartesvalovente2020),
        'cartesvalovente2021' => json_encode($cartesvalovente2021),
        'cartesvaloutilisation2017' => json_encode($cartesvaloutilisation2017),
        'cartesvaloutilisation2020' => json_encode($cartesvaloutilisation2020),
        'cartesvaloutilisation2021' => json_encode($cartesvaloutilisation2021),
        'cartessolde2017' => json_encode($cartessolde2017),
        'cartessolde2020' => json_encode($cartessolde2020),
        'cartessolde2021' => json_encode($cartessolde2021),
        'cartesDGS' => $cartesDGS,
        'sitesDGS' => $sitesDGS,
    ]);
    }

    /**
     * @Route("/DGdashboard/planCommunication", name="planCommunication")
     */
    public function planCommunication(PlanCommunicationRepository $plancomRepo): Response
    {
        //ROLE_DS
        $plancomRepo = $this->getDoctrine()->getRepository(PlanCommunication::class);
        $planCom= $plancomRepo ->findby(
            ['user' => $this->getUser()],
            ['annee' => 'ASC'],
            6,
        );  
        //ROLE_DR
        //ROLE_DG
    return $this->render('dg/planCommunication.html.twig', [
        'planCom' => $planCom,
    ]);
    }

    /**
     * @Route("/DGdashboard/pass", name="pass")
     */
    public function pass(PassRepository $passRepo, UserRepository $userRepo, SitesRepository $sitesRepo): Response
    {
        $passRepo = $this->getDoctrine()->getRepository(Pass::class);
        $pass = $passRepo ->findby(
            ['site' => $this->getUser()],
            ['site' => 'ASC'],
        );  
        
        //ROLE_DG
        $userDGS = $userRepo ->findAll();
        $sitesDGS = $sitesRepo ->userAndSites();
        $passDGS = $passRepo ->sitesAndPass();

    return $this->render('dg/pass.html.twig', [
        'pass' => $pass,
        'userDGS' => $userDGS,
        'sitesDGS' => $sitesDGS,
        'passDGS' => $passDGS,
    ]);
    }

    /**
     * @Route("/DGdashboard/frequentation&CA", name="frequentation")
     */
    public function freq(RigRepository $rigRepo, SitesRepository $sitesRepo, TotalRigRepository $totalrepo): Response
    {
        //ROLE_DS
        $rigRepo = $this->getDoctrine()->getRepository(Rig::class);
        $rig = $rigRepo ->findby(
            ['user' => $this->getUser()],
            ['mois' => 'ASC'],
            6,
        );  
        //ROLE_DR
        //ROLE_DG
        $freqDGS = $rigRepo ->sitesAndRig();
        $sitesDGS = $sitesRepo ->findAll();
        $test = $totalrepo->panierMoyenTotal();

    return $this->render('dg/frequentation.html.twig', [
        'rig' => $rig,
        'freqDGS' => $freqDGS,
        'sitesDGS' => $sitesDGS,
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
    public function sites(SitesRepository $sitesRepo, UserRepository $userRepo): Response
    {

        //ROLE_DR
        $sitesRepo = $this->getDoctrine()->getRepository(Sites::class);
        $sitesDR = $sitesRepo -> findBy(
            ['user' => $this->getUser()],
            ['ville' => 'ASC'],
        );  

        //ROLE_DG
        $userDG = $userRepo -> findAll();
        $sitesDG = $sitesRepo -> userAndSites();

        //ROLE_DS
        $sitesDS = $sitesRepo -> findOneBy(
            ['user' => $this->getUser()]);


        // (console.log) sur $filters à faire
        //$filters = $request->get("sites");
        // On vérifie si on a une requête AJAX
        //    if ($request->get('ajax')){
        // render des données en Json
        //        return new JsonResponse([
        //            $this->renderView('dg/listeDesSites.html.twig', [
        //            'sites' => $sites,
        //            ])
        //        ]);
        //    }

    return $this->render('dg/listeDesSites.html.twig', [
        'sitesDR' => $sitesDR,
        'userDG' => $userDG,
        'sitesDS' => $sitesDS,
        'sitesDG' => $sitesDG,
    ]);
    }

    /**
     * @Route("/DGdashboard/coutCommunication", name="coutCommunication")
     */
    public function coutCommunication(PlanCommunicationRepository $planRepo, UserRepository $userRepo, SitesRepository $sitesRepo, TotalCoutComRepository $totalCoutCom, TotalRigRepository $rig): Response
    {

    // ************************* DS VIEW *******************************
    $typeobjectif = $planRepo->findby(
        ['user' => $this->getUser()],
        ['annee' => 'ASC']
    );  
    $repartitionObjectif = [];
    $annee = [];

        // Type objectif par année : récapitulatif / répartition
    foreach($typeobjectif as $repartitionTypeObjectif) {
            $repartitionObjectif[] = ($repartitionTypeObjectif->getObjectif());//count()
            $annee[] = $repartitionTypeObjectif->getAnnee();
            }

    // ************************* DR VIEW *******************************

    // ************************* DG VIEW *******************************
    $userDGS = $userRepo->findAll();
    $sitesDGS = $sitesRepo -> userAndSites();
    $coutcomDGS = $planRepo -> sitesAndCoutCom();
    $annee = [];
    $conquete = [];
    //$repartitionobjectif2017 = $planRepo->findByAnnee("2019");

            //******************* EVOLUTION COUT TOTAUX PAR ANNEE */
            $evolution_cout_total = $totalCoutCom->findAll();
            foreach($evolution_cout_total as $evolution_cout_totaux) {
                $anneeCoutTotaux[] = $evolution_cout_totaux->getAnnee();
                $evolution_cout_com[] = $evolution_cout_totaux->getCoutTotaux();
                }

            //******************* EVOLUTION COUT TOTAUX PAR OBJECTIF ET PAR ANNEE*/
            $objectifs2017 = $planRepo->findByObjectif("Conquete");
            foreach($objectifs2017 as $objectif2017) {
                $annee[] = $objectif2017->getAnnee();
                $conquete[] = $objectif2017->getCoutTotal();
                }


    return $this->render('dg/coutCommunication.html.twig', [
        'repartitionObjectif' => json_encode($repartitionObjectif),
        'annee' => json_encode($annee),
        'userDGS' => $userDGS,
        'sitesDGS' => $sitesDGS,
        'coutcomDGS' => $coutcomDGS,
        'anneeCoutTotaux' => json_encode($anneeCoutTotaux),
        'evolution_cout_com' => json_encode($evolution_cout_com),
        'objectifs2017' => json_encode($objectifs2017),
        'annee' => json_encode($annee),
        'conquete' => json_encode($conquete),
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
            return $this->redirectToRoute('nouveauSite');
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
            try {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($swot);
                $entityManager->flush();
                $this->addFlash(
                    "success",
                    "Le SWOT de votre site a bien été créée, vous n'avez plus qu'à rentrer les forces et faiblesses de ce dernier ! :)"
                );
                return $this->redirectToRoute('nouveauSwot');
                }
            catch (\Exception $php_errormsg) {
                $this->addFlash(
                    'danger',
                    "Une erreur est survenue, votre Swot n'a pas été enregistré"
                  );
            }
        }
        return $this->render('registration/newSwot.html.twig', [
            'form' => $form->createView()
         ]);
    }

    /**
     * @Route("/DGdashboard/listeDesSites/{id}/newCartesCadeaux", name="newCartesCadeaux", requirements={"id"="\d+"})
     */
    public function newCartesCadeaux(Request $request, SitesRepository $sitesRepo, int $id): Response
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
                "Vos chiffres concernant vos Cartes Cadeaux ont été bien enregistrés sur le site correspondant :)"
            );

            return $this->redirectToRoute('newCartesCadeaux', ['id' => $cadeaux->getSite()->getId()]);
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
        $form = $this->createForm(PlanCommunicationFormType::class, $planCom);

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
                "Votre Plan de communication a bien été associé à votre site ! :)"
            );

            return $this->redirectToRoute('newPlanCommunication', ['id' => $planCom->getSite()->getId()]);
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
                "Votre enquête de satisfaction pour le mois a bien été ajoutée votre site, félicitations ! :)"
            );

            return $this->redirectToRoute('newSatisfaction', ['id' => $satisfaction->getSite()->getId()]);
        }

        return $this->render('registration/newSatisfaction.html.twig', [
            'form' => $form->createView()
         ]);
    }

    /**
    * @Route("/DGdashboard/listeDesSites/{id}/newRig", name="newRig", requirements={"id"="\d+"})
    */
    public function newRig(Request $request, SitesRepository $sitesRepo, int $id): Response
    {
        $rig = new Rig();
        $form = $this->createForm(RigFormType::class, $rig);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $sites = $sitesRepo->find($id);
            $rig->setSite($sites);
            $rig->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rig);
            $entityManager->flush();

            $this->addFlash(
                "success",
                "Votre C.A/Fréquentation a bien été enregistrée pour votre site ! :)"
            );

            return $this->redirectToRoute('newRig', ['id' => $rig->getSite()->getId()]);
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

    /**
     * @Route("/DGdashboard/Satisfaction/{id}/editSastisfaction", name="editSatisfaction")
     */
    public function editSatisfaction(Satisfaction $satisfaction, Request $request) : Response {
        $form = $this->createForm(SatisfactionType::class, $satisfaction);
        $form->handleRequest($request);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($satisfaction);
        $entityManager->flush();

        return $this->render('edit/editSatisfaction.html.twig', [
            'form' => $form->createView()
         ]);
    }

    /**
     * @Route("/DGdashboard/CartesCadeaux/{id}/editCartesCadeaux", name="editCartesCadeaux")
     */
    public function editCartesCadeaux(CartesCadeaux $cartes, Request $request) : Response {
        $form = $this->createForm(CartesCadeauxFormType::class, $cartes);
        $form->handleRequest($request);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cartes);
        $entityManager->flush();

        return $this->render('edit/editCartesCadeaux.html.twig', [
            'form' => $form->createView()
         ]);
    }

    /**
     * @Route("/DGdashboard/Pass/{id}/editPlanCom", name="editPlanCom")
     */
    public function editPlanCommunication(PlanCommunication $plancom, Request $request) : Response {
        $form = $this->createForm(PlanCommunicationFormType::class, $plancom);
        $form->handleRequest($request);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($plancom);
        $entityManager->flush();

        return $this->render('edit/editPlanCommunication.html.twig', [
            'form' => $form->createView()
         ]);
    }

        /**
     * @Route("/DGdashboard/Pass/{id}/editPass", name="editPass")
     */
    public function editPass(Pass $pass, Request $request) : Response {
        $form = $this->createForm(PlanCommunicationFormType::class, $pass);
        $form->handleRequest($request);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($pass);
        $entityManager->flush();

        return $this->render('edit/editPlanCommunication.html.twig', [
            'form' => $form->createView()
         ]);
    }

    /**
     * @Route("/DGdashboard/Rig/{id}/editRig", name="editRig")
     */
    public function editRig(Rig $rig, Request $request) : Response {
        $form = $this->createForm(RigFormType::class, $rig);
        $form->handleRequest($request);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($rig);
        $entityManager->flush();

        return $this->render('edit/editRig.html.twig', [
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

        return $this->redirectToRoute('swot');
    }

    /** 
    * @Route("/DGdashboard//{id}/supprimerCarteCadeau", name="deleteCarteCadeau")
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
    function deleteSites(Sites $sites): Response {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager -> remove($sites);
        $entityManager->flush();
 
        return $this->redirectToRoute('listeDesSites');
     }

    /** 
    * @Route("/DGdashboard//{id}/deleteSatisfaction", name="deleteSatisfaction")
    */
    function deleteSatisfaction(Satisfaction $satisfaction): Response {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager -> remove($satisfaction);
        $entityManager->flush();
 
        return $this->redirectToRoute('listeDesSites');
     }

    /** 
    * @Route("/DGdashboard//{id}/deletePass", name="deletePass")
    */
    function deletePass(Pass $pass): Response {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager -> remove($pass);
        $entityManager->flush();
 
        return $this->redirectToRoute('listeDesSites');
     }

    /** 
    * @Route("/DGdashboard//{id}/deleteRig", name="deleteRig")
    */
    function deleteRig(Rig $rig): Response {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager -> remove($rig);
        $entityManager->flush();
 
        return $this->redirectToRoute('listeDesSites');
     }

    /** 
    * @Route("/DGdashboard//{id}/deletePlanCommunication", name="deletePlanCommunication")
    */
    function deletePlanCommunication(PlanCommunication $plancom): Response {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager -> remove($plancom);
        $entityManager->flush();
 
        return $this->redirectToRoute('listeDesSites');
     }

}



