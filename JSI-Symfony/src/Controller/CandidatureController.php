<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CandidatureController extends AbstractController
{
    /**
     * @Route("/admin/candidature", name="candidature")
     */
    public function index()
    {
        
        // Injecter le PHP pour les lire toutes les candidatures de la BDD
        return $this->render('candidature/index.html.twig', [
            'controller_name' => 'CandidatureController',
        ]);
    }
}
