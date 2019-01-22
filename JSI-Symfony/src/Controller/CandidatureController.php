<?php

namespace App\Controller;

use App\Entity\Candidature;
use App\Repository\CandidatureRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CandidatureController extends AbstractController
{
    /**
     * @Route("/admin/candidature", name="candidature")
     */
    public function index(CandidatureRepository $candidatureRepository)
    {
        
        $candidatures = $candidatureRepository->findBy([],[ "dateReception" => "DESC" ]);
        
        return $this->render('candidature/index.html.twig', [
            'candidatures' => $candidatures,
        ]);
    }
    /**
     * @Route("/admin/candidature/{id}", name="candidature_show", methods={"GET"})
     */
    public function show(Candidature $candidature): Response
    {
        return $this->render('candidature/show.html.twig', [
            'candidature' => $candidature,
        ]);
    }
}
