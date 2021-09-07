<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('DGdashboard');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    //Le but ici est de faire activer un compte après inscription, pour activer le token, le manager doit aller sur /activation/{Token généré en bdd}, but après est d'envoyer un e-mail
     /**
     * @Route("/activation/{token}", name="acitvation")
     */
    public function activation ($token, UserRepository $userRepository){

        //je vérifie si l'user a bien le token et on va le chercher en base de donnée, findOneBy marche avec la paire KEY=VALUE
        $user = $userRepository->findOneBy(['activation_token' => $token]);

        //Si aucun user existe avec ce token
        if(!$user){
            //Erreur 404
            throw $this->createNotFoundException("cet utilisateur n'existe pas !");
        }
        //je supprime le token si le token a bel et bien été trouvé
        $user->setActivationToken(null);
        $entityManager = $this->getdoctrine()->getManager();
        $entityManager -> persist($user);
        $entityManager -> flush();

        $this->addFlash('message', 'Vous avez bien activé votre compte');

        //je fais retourner vers l'accueil
        return $this->redirectToRoute('app_login');
    }

}
