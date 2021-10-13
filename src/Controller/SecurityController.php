<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use App\Form\ResetPasswordRequestFormType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        return $this->redirect($this->generateUrl('app_login'));
    }


    // Request permet de récupérer les informations du formulaire et de les traiter
    /**
     * @Route("/oubli-mot-de-passe", name="app_forgotten_password")
     */
    public function forgottenPass(Request $request, UserRepository $userRepo, \Swift_Mailer $mailer, TokenGeneratorInterface $tokenGen) {

        $form = $this->createForm(ResetPasswordRequestFormType::class);
        $form ->handleRequest($request);

        // Si le form est valide, traitement du form
        if($form->isSubmitted() && $form->isValid()) {
            // récupération des données
            $datas = $form->getData();
            // on cherche si un user a un email
            $user = $userRepo->findOneByEmail($datas['email']);
            // si user n'existe pas
            if(!$user) {
                // message flash erreur
                $this->addFlash('dark', 'cette adresse mail n\'existe pas, veuillez en choisir une autre');
                return $this -> redirectToRoute('app_login'); 
            }

            //génération de token
            $token = $tokenGen->generateToken();
            try{
                $user->setResetToken($token);
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
            }
            catch(\Exception $e) {
                $this-> addFlash("warning", "une erreur est survenue : ". $e->getMessage());
                return $this -> redirectToRoute('app_login'); 
            }

            // Url de réinitialisation
            $url = $this->generateUrl('app_reset_password', ['token' => $token]);

            //On envoie le message
            $message = (new \Swift_Message('mot de passe oublié'))
            ->setFrom('stagiaire1.comm@vert-marine.com')
            ->setTo($user->getEmail())
            ->setBody(
                '<p>Bonjour,</p><p> <br><br>Une demande de réinitialisation de mot de passe a été effectuée pour l\'application AppSheet, veuillez cliquer sur le lien suivant : '. $url .'text/html</p>'
            );

            //envoi de l'e-mail
            $mailer->send($message);

            // on crée le message flash
            $this -> addFlash('message', 'un e-mail de reset de mot de passe vous a été envoyé');

            return $this->redirectToRoute('app_login');
        }

        // On envoie vers la page de demande de e-mail
        return $this->render("security/forgotten_password.html.twig", ['emailForm' => $form->createView()]);
    }

    /**
     * @Route("/reset-password/{token}", name="app_reset_password")
     */
    public function resetPassword($token, Request $request, UserPasswordEncoderInterface $passwordHasher)
    {
        // On va chercher le user avec le token
        $user = $this->getdoctrine()->getRepository(User::class)->findOneBy(['reset_token' => $token]);

        if(!$user){
            $this->addFlash('danger', 'Token inconnu');
            return $this->redirectToRoute('app_login');
        }

        // on check si le form est envoyé en méthode Post
        if($request->isMethod('Post')){
            // token mis en null
            $user->setResetToken(null);

            // on chiffre le MDP
            $user->setPassword($passwordHasher->encodePassword($user, $request->request->get('password')));
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->addFlash('warning', 'mot de passe modifié avec succès');
            return $this->redirectToRoute('app_login');
        }
        else {
            return $this->render('security/reset_password.html.twig', ['token', $token]);
        }
    }


}
