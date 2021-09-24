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
use Doctrine\ORM\Query\AST\Functions\AvgFunction;
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
        $swotDG = $swotRepo ->findAll();
        $userDG = $userRepo ->findAll();

    return $this->render('dg/swot.html.twig', [
        'swot' => $swot,
        'form' => $form->createView(),
        'swotList' => $swotList,
        'swotDR' => $swotDR,
        'swotDS' => $swotDS,
        'swotDG' => $swotDG,
        'userDG' => $userDG,
    ]);
    }

    /**
     * @Route("/DGdashboard/satisfaction", name="satisfaction")
     */
    public function satisfaction(SatisfactionRepository $satisfactionRepo, SitesRepository $siteRepo): Response
    {
        $siteduDS = $siteRepo -> findOneBy (
            ['user' => $this->getUser()],
        );

        // Données DS
        $trimestre = [];
        $satisglobale2019 = $satisfactionRepo->findByAnnee("2019");
        $satisglobale2020 = $satisfactionRepo->findByAnnee("2020");
        $satisglobale2021 = $satisfactionRepo->findByAnnee("2021");
        $satisproprete2019 = $satisfactionRepo->findByAnnee("2019");
        $satisproprete2020 = $satisfactionRepo->findByAnnee("2020");
        $satisproprete2021 = $satisfactionRepo->findByAnnee("2021");
        $competencepersonnel2019 = $satisfactionRepo->findByAnnee("2019");
        $competencepersonnel2020 = $satisfactionRepo->findByAnnee("2020");
        $competencepersonnel2021 = $satisfactionRepo->findByAnnee("2021");
        $satishoraire2019 = $satisfactionRepo->findByAnnee("2019");
        $satishoraire2020 = $satisfactionRepo->findByAnnee("2020");
        $satishoraire2021 = $satisfactionRepo->findByAnnee("2021");
        $satistemperature2019 = $satisfactionRepo->findByAnnee("2019");
        $satistemperature2020 = $satisfactionRepo->findByAnnee("2020");
        $satistemperature2021 = $satisfactionRepo->findByAnnee("2021");
        $satistemperature2022 = $satisfactionRepo->findByAnnee("2022");

            // FIELD satis_globale
            foreach($satisglobale2019 as $globale2019) {
                $trimestre[]= $globale2019 ->getTrimestre();
                $rendusatisglobale2019[] = $globale2019 ->getSatisGlobale();
            }
    
            foreach($satisglobale2020 as $globale2020) {
                $trimestre[]= $globale2020 ->getTrimestre();
                $rendusatisglobale2020[] = $globale2020 ->getSatisGlobale();
            }
    
            foreach($satisglobale2021 as $globale2021) {
                $trimestre[]= $globale2021 ->getTrimestre();
                $rendusatisglobale2021[] = $globale2021 ->getSatisGlobale();
            }

            // FIELD satis_proprete
            foreach($satisproprete2019 as $globale2019) {
                $trimestre[]= $globale2019 ->getTrimestre();
                $rendusatisproprete2019[] = $globale2019 ->getSatisProprete();
            }
            
            foreach($satisproprete2020 as $globale2020) {
                $trimestre[]= $globale2020 ->getTrimestre();
                $rendusatisproprete2020[] = $globale2020 ->getSatisProprete();
            }
            
            foreach($satisproprete2021 as $globale2021) {
                $trimestre[]= $globale2021 ->getTrimestre();
                $rendusatisproprete2021[] = $globale2021 ->getSatisProprete();
                }

            // FIELD satis_competence_du_personnel
            foreach($competencepersonnel2019 as $comppersonnel2019) {
                $trimestre[]= $comppersonnel2019 ->getTrimestre();
                $renducompetencepersonnel2019[] = $comppersonnel2019 ->getCompetenceDuPersonnel();
                }
                        
            foreach($competencepersonnel2020 as $comppersonnel2020) {
                $trimestre[]= $comppersonnel2020 ->getTrimestre();
                $renducompetencepersonnel2020[] = $comppersonnel2020 ->getCompetenceDuPersonnel();
                }
                        
            foreach($competencepersonnel2021 as $comppersonnel2021) {
                $trimestre[]= $comppersonnel2021 ->getTrimestre();
                $renducompetencepersonnel2021[] = $comppersonnel2021 ->getCompetenceDuPersonnel();
                }
            
            // FIELD satis_horaire
            foreach($satishoraire2019 as $horaire2019) {
                $trimestre[]= $horaire2019 ->getTrimestre();
                $rendusatishoraire2019[] = $horaire2019 ->getSatisHoraires();
                }
                        
            foreach($satishoraire2020 as $horaire2020) {
                $trimestre[]= $horaire2020 ->getTrimestre();
                $rendusatishoraire2020[] = $horaire2020 ->getSatisHoraires();
                }
                        
            foreach($satishoraire2021 as $horaire2021) {
                $trimestre[]= $horaire2021 ->getTrimestre();
                $rendusatishoraire2021[] = $horaire2021 ->getSatisHoraires();
                }
            
            // FIELD satis_temperature
            foreach($satistemperature2019 as $temperature2019) {
                $trimestre[]= $temperature2019 ->getTrimestre();
                $rendusatistemperature2019[] = $temperature2019 ->getTemperatureDouche();
                }
                                                
            foreach($satistemperature2020 as $temperature2020) {
                $trimestre[]= $temperature2020 ->getTrimestre();
                $rendusatistemperature2020[] = $temperature2020 ->getTemperatureDouche();
                }
                                                
            foreach($satistemperature2021 as $temperature2021) {
                $trimestre[]= $temperature2021 ->getTrimestre();
                $rendusatistemperature2021[] = $temperature2021 ->getTemperatureDouche();
                }

            foreach($satistemperature2022 as $temperature2022) {
                $trimestre[]= $temperature2022 ->getTrimestre();
                $rendusatistemperature2022[] = $temperature2022 ->getTemperatureDouche();
                }

        // Données DR
        $satisDR = $satisfactionRepo->findBy(
            ['user' => $this->getUser()],
        );
        $sitesDR = $siteRepo->findBy(
            ['user' => $this->getUser()],
        );
        // Données DG
        $satisDG = $satisfactionRepo->findAll();

    return $this->render('dg/satisfaction.html.twig', [
        'satisDR' => $satisDR,
        'satisDG' => $satisDG,
        'trimestre' => json_encode($trimestre),
        'rendusatisglobale2019' => json_encode($rendusatisglobale2019),
        'rendusatisglobale2020' => json_encode($rendusatisglobale2020),
        'rendusatisglobale2021' => json_encode($rendusatisglobale2021),
        'rendusatisproprete2019' => json_encode($rendusatisglobale2019),
        'rendusatisproprete2020' => json_encode($rendusatisglobale2020),
        'rendusatisproprete2021' => json_encode($rendusatisglobale2021),
        'renducompetencepersonnel2019' => json_encode($renducompetencepersonnel2019),
        'renducompetencepersonnel2020' => json_encode($renducompetencepersonnel2020),
        'renducompetencepersonnel2021' => json_encode($renducompetencepersonnel2021),
        'rendusatishoraire2019' => json_encode($rendusatishoraire2019),
        'rendusatishoraire2020' => json_encode($rendusatishoraire2020),
        'rendusatishoraire2021' => json_encode($rendusatishoraire2020),
        'rendusatistemperature2019' => json_encode($rendusatistemperature2019),
        'rendusatistemperature2020' => json_encode($rendusatistemperature2020),
        'rendusatistemperature2021' => json_encode($rendusatistemperature2021),
        'rendusatistemperature2022' => json_encode($rendusatistemperature2022),
        'siteduDS' => $siteduDS,
        'sitesDR' => $sitesDR
    ]);
    }

    /**
     * @Route("/DGdashboard/carteCadeau", name="carteCadeau")
     */
    public function carteCadeau(CartesCadeauxRepository $cartesRepo, SitesRepository $siteRepo): Response
    {
        // ************************* DS VIEW *******************************
        // Données de la bdd pour la graphique 

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
        

        //données de la bdd pour le tableau - RAPPEL - tri par site et par dates des cartes cadeaux
        $sitesTableau = $siteRepo -> findBy (
            ['user' => $this->getUser()],
        );
        $cartesCadeauxTableau = $cartesRepo->findBy(
            ['site' => $this->getUser(),
            ],
            ['mois' => 'ASC']
        );  
        
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
        'cartesCadeauxTableau' => $cartesCadeauxTableau,
        'sitesTableau' => $sitesTableau,
    ]);
    }

    /**
     * @Route("/DGdashboard/planCommunication", name="planCommunication")
     */
    public function planCommunication(PlanCommunication $plancom): Response
    {
    return $this->render('dg/planCommunication.html.twig', [
        'controller_name' => 'DgController',
    ]);
    }

    /**
     * @Route("/DGdashboard/pass", name="pass")
     */
    public function pass(Pass $pass): Response
    {
        $sitesRepo = $this->getDoctrine()->getRepository(CartesCadeaux::class);
        $sites = $sitesRepo ->findby(
            ['site' => $this->getUser()],
            ['site' => 'ASC'],
        );  
        
    return $this->render('dg/pass.html.twig', [
        'sites' => $sites,
    ]);
    }

    /**
     * @Route("/DGdashboard/frequentation&CA", name="frequentation")
     */
    public function freq(Rig $rig): Response
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
        $sitesDR = $sitesRepo -> findby(
            ['user' => $this->getUser()],
            ['ville' => 'ASC'],
        );  

        //ROLE_DG
        $sites = $sitesRepo -> findby(
            ['user' => "10"],
        );  
        dd($sites);
        $userDG = $userRepo -> findAll();

        //ROLE_DS
        $sitesDS = $sitesRepo -> findOneBy(
            ['user' => $this->getUser()]);


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
        'sitesDR' => $sitesDR,
        'userDG' => $userDG,
        'sitesDS' => $sitesDS,
        'sites' => $sites,
    ]);
    }

    /**
     * @Route("/DGdashboard/coutCommunication", name="coutCommunication")
     */
    public function coutCommunication(PlanCommunicationRepository $planRepo): Response
    {

    // ************************* DS VIEW *******************************
    $typeobjectif2019 = $planRepo->findByAnnee("2019");
    $typeobjectif2020 = $planRepo->findByAnnee("2020");
    $typeobjectif2021 = $planRepo->findByAnnee("2021");
    $typeoperation2019 = $planRepo->findByAnnee("2019");
    $typeoperation2020 = $planRepo->findByAnnee("2020");
    $typeoperation2021 = $planRepo->findByAnnee("2021");
    $couttotal2019 = $planRepo->findByAnnee("2019");
    $couttotal2020 = $planRepo->findByAnnee("2019");
    $couttotal2021 = $planRepo->findByAnnee("2019");

    // Type objectif par année : récapitulatif / répartition
    foreach($typeobjectif2019 as $objectif2019) {
            $typeobjectif2019[] = count($objectif2019 ->getObjectif());
            }

    foreach($typeobjectif2020 as $objectif2020) {
            $typeobjectif2020[] = count($objectif2020 ->getObjectif());
            }

    foreach($typeobjectif2020 as $objectif2021) {
            $typeobjectif2021[] = count($objectif2021 ->getObjectif());
            }
    
    // Type objectif par année : récapitulatif / répartition
    foreach($typeoperation2019 as $operation2019) {
        $cartesvendues2020[] = count($operation2019 ->getTypeOperation());
        }

    foreach($typeoperation2020 as $operation2020) {
        $cartesvendues2017[] = count($operation2020 ->getTypeOperation());
        }

    foreach($typeoperation2021 as $operation2021) {
        $typeobjectif2021[] = count($operation2021 ->getTypeOperation());
        }
    
    // Type cout total par année : récapitulatif / répartition
    foreach($couttotal2019 as $cout2019) {
        $cartesvendues2020[] = array_sum($cout2019 ->getObjectif());
        }

    foreach($couttotal2020 as $cout2020) {
        $cartesvendues2017[] = array_sum($cout2020 ->getObjectif());
        }

    foreach($couttotal2021 as $cout2021) {
        $typeobjectif2021[] = array_sum($cout2021 ->getObjectif());
        }

    // ************************* DR VIEW *******************************
    // ************************* DG VIEW *******************************

    return $this->render('dg/coutCommunication.html.twig', [
        'typeobjectif2019' => json_encode($typeobjectif2019),
        'typeobjectif2020' => json_encode($typeobjectif2020),
        'typeobjectif2021' => json_encode($typeobjectif2021),
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
     * @Route("/DGdashboard/Pass/{id}/editPass", name="editPass")
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



