<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }

    /**
     * @Route("/services", name="services")
     */
    public function services() 
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }

    /**
     * @Route("/recherche", name="recherche", methods={"GET","POST"})
     */
    public function recherche(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            $messageRetour = "Ok fait !";
        }

        return $this->render('public/recherche.html.twig', [
            'formRecherche' => $form->createView(),
            'messageRetour' => $messageRetour ?? "",
        ]);
    }

    /**
     * @Route("/contact", name="contact", methods={"GET","POST"})
     */
    public function contact(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            $messageRetour = "Ok fait !";
        }

        return $this->render('public/contact.html.twig', [
            'formRecherche' => $form->createView(),
            'messageRetour' => $messageRetour ?? "",
        ]);
    }

    /**
     * @Route("/recrutement", name="recrutement")
     */
    public function recrutement() 
    {
        // TRAITEMENT DU FORMULAIRE RECRUTEMENT A LA MAIN (INSERTION BDD) => TABLE RECRUTEMENT
        return $this->render('public/recrutement.html.twig', [
            'controller_name' => 'PublicController',
            // variableTwig => $variablePHPconfirmationEnvoi
        ]);
    }

    /**
     * @Route("/annonce", name="annonce")
     */
    public function annonce() 
    {
        return $this->render('public/annonce.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }
}
