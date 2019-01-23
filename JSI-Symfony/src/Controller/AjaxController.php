<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AjaxController extends AbstractController
{
    /**
     * @Route("/ajax", name="ajax")
     */
    public function index(AnnonceRepository $annonceRepository)
    {
        $tabAsso = [];
        $tabAsso["message"]="";

        // Faire la requête (voir si on peut mettre un multicritère dans la méthode findBy), et renvoyer un tableau en format JSON
        // $annonces = $annonceRepository->findAll();
        
        // custom query
        $annonces = $annonceRepository->simRechercheSQL();
        dump($annonces);
        // traitement du retour SQL 3 max & 3 min resultat a stocker dans $tabAsso
        $arrayLength = count($annonces);
        if ($arrayLength > 6) array_splice($annonces, 3, $arrayLength - 6);

        if ($arrayLength === 0) {
            $tabAsso["message"] = "Désolé nous n'avons pas trouvé d'annonces 'publiques' correspondantes à votre recherche";
        }

        $tabAsso["annonces"]= $annonces;

        return $this->json($tabAsso);
    }
}