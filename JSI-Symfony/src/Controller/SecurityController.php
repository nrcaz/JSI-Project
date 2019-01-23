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
     * @Route("/forgetpassword", name="security_password_forget")
     */
    public function forgetpassword(Request $request, UserRepository $userRepository, ObjectManager $manager, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer) {
        
        $email = $request->get("email");

        if($email != "") {

            $user = $userRepository->findOneBy([ "email" => $email ]);

            if($user) {
                
                $newPassword = uniqid();
                $hash = $encoder->encodePassword($user, $newPassword);

                $user->setPassword($hash);
                $manager->persist($user);
                $manager->flush();
                
            $body = 
<<<CODEHTML

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bonjour, vous recevez ce message suite à une demande de renouvellement de mot de passe.</h1>
    <p>Votre nouveau mot de passe :</p>
    <p>$newPassword</p>
    <strong>Pour des raisons de sécurité, nous vous conseillons de modifier votre mot de passe par un nouveau et de supprimer par la suite cet email. </strong>
</body>
</html>

CODEHTML;
                $message = (new \Swift_Message("Renouvellement de votre mot de passe"))
                    ->setFrom('flobsn06@gmail.com')
                    ->setTo($email)
                    ->setBody($body, 'text/html');
                $mailer->send($message);

                $retourMessage = "Un nouveau mot de passe vous a été envoyé sur votre boîte mail";
                 
            } else {
                $retourMessage = "Nous n'avons pas trouvé votre email";
            }
        } else {
            $retourMessage = "";
        }

        return $this->render('forgetpassword/index.html.twig', [
            'retourMessage' => $retourMessage
        ]);
    }

    /**
     * @Route("/changepassword", name="security_password_change")
     */
    public function changepassword(UserRepository $userRepository, ObjectManager $manager, Request $request, UserPasswordEncoderInterface $encoder) {

        $email = $request->get("email");
        $user = $userRepository->findOneBy([ "email" => $email ]);

        if($user) {
            
            // Si je trouve un user, je recupère son mot de passe actuel ,et celui qu'il a saisit
            $oldPassword = $user->getPassword();
            $saisieOldPassword = $request->get("old_password");

            // Puis je compare si ça match avec ce qu'a saisit l'utilisateur
            if(password_verify($saisieOldPassword, $oldPassword)) {
                
                $newPassword = $request->get("new_password");
                $hash = $encoder->encodePassword($user, $newPassword);
                $user->setPassword($hash);
    
                $manager->persist($user);
                $manager->flush();
    
                $message = "Votre mot de passe a bien été modifié !";
            } else {
                $message = "L'ancien mot de passe saisit ne correspond pas";
            }
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

