<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\UserRepository;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {

            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $identifiant = $user->getUsername();

            $manager->persist($user);
            $manager->flush($user);

            // ON DOIT ENVOYER UN MAIL AVEC LA CLE D'ACTIVATION
            // $email          = $user->getEmail();
            // ON PEUT CREER LE HTML EN PHP OU AVEC TWIG
            $body = 
<<<CODEHTML

<h1>Merci pour votre inscription ! Pour rappel, votre identifiant est $identifiant : </a>

CODEHTML;
            
            $message = (new \Swift_Message("MERCI !"))
                ->setFrom('no-reply@monsite.fr')
                ->setTo('test1733@gmail.me')
                ->setBody($body, 'text/html');
            $mailer->send($message);

            return $this->redirectToRoute('security_login');
        }
        
        return $this->render('security/inscription.html.twig', [
            'controller_name' => 'SecurityController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/forgetpassword", name="security_password_forget")
     */
    public function forgetpassword(Request $request, UserRepository $userRepository, ObjectManager $manager, UserPasswordEncoderInterface $encoder) {
        
        $email = $request->get("email");

        if($email != "") {

            $user = $userRepository->findOneBy([ "email" => $email ]);

            if($user) {
                
                $newPassword = uniqid();
                $hash = $encoder->encodePassword($user, $newPassword);

                $user->setPassword($hash);
                $manager->persist($user);
                $manager->flush();
                
                $message = "Votre nouveau mot de passe est ($newPassword)";
                dump($user);
            } else {
                $message = "Nous n'avons pas trouvé votre email";
            }
        } else {
            $message = "";
        }

        return $this->render('forgetpassword/index.html.twig', [
            'message' => $message
        ]);
    }

    /**
     * @Route("/changepassword", name="security_password_change")
     */
    public function changepassword(UserRepository $userRepository, ObjectManager $manager, Request $request, UserPasswordEncoderInterface $encoder) {

        $email = $request->get("email");
        $newPassword = $request->get("new_password");

        $user = $userRepository->findOneBy([ "email" => $email ]);
        dump($user);

        if($user) {

            $hash = $encoder->encodePassword($user, $newPassword);
            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();

            $message = "Votre mot de passe a bien été modifié !";
        } 
        
        return $this->render('changepassword/index.html.twig', [
            'message' => $message ?? ""
        ]);
    }
    
    /**
     * @Route("/login", name="security_login")
     */
    public function login(AuthenticationUtils $authenticationUtils) {

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('security/login.html.twig', [
            'error' => $error
        ]);
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout() {}
}   

