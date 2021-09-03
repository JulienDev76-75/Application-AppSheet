<?php

namespace App\Controller;

use App\Repository\SitesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Sites;
use App\Form\SiteType;
use App\Entity\Swot;
use App\Form\SwotType;
use Symfony\Bundle\FrameworkBundle\Controller\RedirectController;

/**
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 */

class DgController extends AbstractController
{
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
    public function swot(): Response
    {
        $swotRepo = $this->getDoctrine()->getRepository(Swot::class);
        $swot = $swotRepo -> findby(
            ['user' => $this->getUser()],
        );  

    return $this->render('dg/swot.html.twig', [
        'swot' => $swot,
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
    public function carteCadeau(): Response
    {
    return $this->render('dg/carteCadeau.html.twig', [
        'controller_name' => 'DgController',
    ]);
    }


    /**
     * @Route("/DGdashboard/planCommunication", name="planCommunication")
     */
    public function planCommunication(): Response
    {
    return $this->render('dg/swot.html.twig', [
        'controller_name' => 'DgController',
    ]);
    }


    /**
     * @Route("/DGdashboard/pass", name="pass")
     */
    public function pass(): Response
    {
    return $this->render('dg/pass.html.twig', [
        'controller_name' => 'DgController',
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
     * @Route("/DGdashboard/listeDesSites", name="listeDesSites")
     */
    public function sites(): Response
    {
        $sitesRepo = $this->getDoctrine()->getRepository(Sites::class);
        $sites = $sitesRepo -> findby(
            ['user' => $this->getUser()],
        );  

    return $this->render('dg/listeDesSites.html.twig', [
        'sites' => $sites,
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
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($swot);
            $entityManager->flush();

             $this->addFlash(
                 "success",
                "Votre projet a bien été ouvert, vous n'avez plus qu'à mettre vos premières tâches afin d'atteindre vos objectifs ! :)"
            );

            return $this->redirectToRoute('DGdashboard');
        }

        return $this->render('registration/newSwot.html.twig', [
            'form' => $form->createView()
         ]);
    }


    ///**
    // * @Route("/DGdashboard/swot/{id}/supprimerSwot", name="supprimerSwot")
    // */
    //function deleteSwot(Swot $swot): Response {
    //    $entityManager = $this->getDoctrine()->getManager();
    //    $entityManager -> remove($swot);

    //    $entityManager->flush();

    //    return $this->redirectToRoute('DGdashboard');
    //}

}



