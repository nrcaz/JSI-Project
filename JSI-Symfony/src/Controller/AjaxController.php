<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\AnnonceRepository;

class AjaxController extends AbstractController
{
    /**
     * @Route("/ajax", name="ajax")
     */
    public function index(AnnonceRepository $annonceRepository, Request $request)
    {
        $tabAsso = [];

        // Faire la requête (voir si on peut mettre un multicritère dans la méthode findBy), et renvoyer un tableau en format JSON
        // $annonces = $annonceRepository->findAll();

        // on recupere les infos de request
        $request->request->all(); // pas test mais devrait creer toute les variable en fonction du nom des input du form ? a voir sinon a faire pour chaque input
        // $request->request->get('input');
        
        // custom query
        $query = 'SELECT * FROM annonce a 
            WHERE a.surface > :surfaceMin AND a.surface < :surfaceMax AND a.bureaux >= :nbBureaux AND a.open_space >= :nbOpenSpace AND a.salle_reunion >= :nbSalleReunion AND a.espace_detente >= :nbEspaceDetente 
            ORDER BY a.surface ASC';

        $annonces = $annonceRepository
            ->getEntityManager()
            ->getConnection()
            ->prepare($query)
            ->execute([
                'surfaceMin' => $surfaceMin,
                'surfaceMax' => $surfaceMax,
                'nbBureaux' => $nbBureaux,
                'nbOpenSpace' => $nbOpenSpace,
                'nbSalleReunion' => $nbSalleReunion,
                'nbEspaceDetente' => $nbEspaceDetente
            ])
            ->fetchAll();
        dump($annonces);
        
        // traitement du retour SQL 3 max & 3 min

        // return $this->json($tabAsso);
        return $this->render('ajax/index.html.twig', [
            'controller_name' => 'AjaxController',
            'annonces' => $annonces 
        ]);
    }
}