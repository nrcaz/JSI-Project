<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BackOfficeController extends AbstractController
{
    /**
     * @Route("/admin/accueil", name="back_office_accueil")
     */
    public function index()
    {
        $session = new Session();

        // $session->start();
        // $session->getFlashBag()->get('username');
        
        // dump($session);
        return $this->render('accueilBackOffice/index.html.twig', [
            '' => '',
        ]);
    }
}
