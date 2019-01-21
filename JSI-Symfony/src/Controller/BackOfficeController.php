<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BackOfficeController extends AbstractController
{
    /**
     * @Route("/admin/accueil", name="back_office_accueil")
     */
    public function index()
    {
        return $this->render('accueilBackOffice/index.html.twig', [
            '' => '',
        ]);
    }
}
