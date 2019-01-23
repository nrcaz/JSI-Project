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

            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $identifiant = $user->getUsername();
            $email = $user->getEmail();

            $manager->persist($user);
            $manager->flush($user);
            
            // ON PEUT CREER LE HTML EN PHP OU AVEC TWIG
            $body = 
<<<CODEHTML

<h1>Merci pour votre inscription ! Pour rappel, votre identifiant est $identifiant : </a>

CODEHTML;
            
            $message = (new \Swift_Message("MERCI !"))
                ->setFrom('no-reply@monsite.fr')
                ->setTo($email)
                ->setBody($body, 'text/html');
            $mailer->send($message);

            return $this->redirectToRoute('security_login');
        }
        
        return $this->render('user/inscription.html.twig', [
            'controller_name' => 'SecurityController',
            'form' => $form->createView()
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
