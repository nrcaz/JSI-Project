<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/admin/users", name="liste_administrateurs")
     */
    public function index(UserRepository $userRepository)
    {

        $users = $userRepository->findAll();

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("admin/inscription", name="new_administrateur")
     */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {
            
            $password = $user->getPassword();
            $hash = $encoder->encodePassword($user, $password);
            $user->setPassword($hash);
            $identifiant = $user->getUsername();
            $email = $user->getEmail();

            $manager->persist($user);
            $manager->flush($user);
            
            // ON PEUT CREER LE HTML EN PHP OU AVEC TWIG
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
    <h1>Merci pour votre inscription ! Voici un récapitulatif de vos informations :</h1>
    <ul>
        <li>Identifiant : $identifiant</li>
        <li>Email : $email</li>
        <li>Mot de passe : $password</li>
    </ul>
    <strong>Nous vous conseillons fortement de supprimer ce mail pour des raisons de sécurité.</strong>
</body>
</html>

CODEHTML;
            
            $message = (new \Swift_Message("Confirmation de votre inscription au site JSI-Partner !"))
                ->setFrom('flobsn06@gmail.com')
                ->setTo($email)
                ->setBody($body, 'text/html');
            $mailer->send($message);
            $messageRetour = "Votre mot de passe a bien été modifié !";

        }
        
        return $this->render('user/inscription.html.twig', [
            'form' => $form->createView(),
            'messageRetour' => $messageRetour
        ]);
    }

    /**
     * @Route("/admin/{id}", name="delete_administrateur", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('liste_administrateurs');
    }
}
