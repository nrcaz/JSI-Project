<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CandidatureRepository;

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
}
