<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnnonceRepository;
use App\Controller\Request;

class AjaxController extends AbstractController
{
    /**
     * @Route("/ajax", name="ajax")
     */
    public function index(AnnonceRepository $annonceRepository, Request $request)
    {
        $tabAsso = [];

        // Faire la requête (voir si on peut mettre un multicritère dans la méthode findBy), et renvoyer un tableau en format JSON
        $annonces = $annonceRepository->findAll();
        $tabAsso["tabAnnonces"] = $annonces;

        // return $this->json($tabAsso);
        return $this->render('ajax/index.html.twig', [
            'controller_name' => 'AjaxController',
            'annonces' => $annonces 
        ]);
    }
}
