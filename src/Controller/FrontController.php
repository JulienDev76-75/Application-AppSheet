<?php

namespace App\Controller;

use App\Repository\SitesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    return $this->render('dg/swot.html.twig', [
        'controller_name' => 'DgController',
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
        //sites(SitesRepository $sitesrepo)
        //$sites= $sitesrepo -> findAll();
        //$siteNom = 

    return $this->render('dg/listeDesSites.html.twig', [
        'controller_name' => 'DgController',
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
    
}