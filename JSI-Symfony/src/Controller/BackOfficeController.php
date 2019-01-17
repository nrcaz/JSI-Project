<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BackOfficeController extends AbstractController
{
    /**
     * @Route("/admin", name="back_office")
     */
    public function index()
    {
        return $this->render('backoffice.html.twig', [
            'controller_name' => 'BackOfficeController',
        ]);
    }
}
