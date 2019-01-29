<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Candidature;
use App\Entity\Contact;
use App\Entity\Annonce;
use App\Form\ContactType;
use App\Repository\ContactRepository;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ajout de la dateReception
            $contact->setDateReception(new \Datetime());
            // insert DB
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->render('public/confirmation.html.twig', [
                'formulaire' => "message",
            ]);
        }

        return $this->render('public/index.html.twig', [
            'formRecherche' => $form->createView(),
            'accueil' => true
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
            // ajout de la dateReception
            $contact->setDateReception(new \Datetime());
            // insert DB
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->render('public/confirmation.html.twig', [
                'formulaire' => "demande",
            ]);
        }
        return $this->render('public/recherche.html.twig', [
            'formRecherche' => $form->createView(),
        ]);
    }

    /**
     * @Route("/recrutement", name="recrutement")
     */
    public function recrutement(Request $request) 
    {
        $candidature = new Candidature();

        $form = $this->createFormBuilder($candidature)
                ->add('nom')
                ->add('prenom')
                ->add('email')
                ->add('cv')
                ->add('message')
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ajout de la dateReception
            $candidature->setDateReception(new \Datetime());
            // insert DB
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($candidature);
            $entityManager->flush();

            return $this->render('public/confirmation.html.twig', [
                'formulaire' => "candidature",
            ]);
        }

        return $this->render('public/recrutement.html.twig', [
            'formCandidature' => $form->createView(),
        ]);
    }

    /**
     * @Route("/annonce/{id}", name="annonce")
     */
    public function annonce(Annonce $annonce, Request $request) 
    {

        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // ajout de la dateReception
            $contact->setDateReception(new \Datetime());
            // insert DB
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->render('public/confirmation.html.twig', [
                'formulaire' => "demande",
                ]);
        }

        $demande = "Surface " . $annonce->getSurface() . " m² \n| " . $annonce->getBureaux() . " Bureaux \n| " . $annonce->getOpenSpace() . " Open Space \n| " . $annonce->getSalleReunion() . " Salle de Reunion \n| " . $annonce->getEspaceDetente() . " Cuisine / Espace Detente";
        return $this->render('public/annonce.html.twig', [
            'formRecherche' => $form->createView(),
            'annonce' => $annonce,
            'demandeContent' => $demande,
        ]);
    }
}
