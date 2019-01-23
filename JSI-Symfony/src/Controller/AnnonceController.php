<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/annonce")
 */
class AnnonceController extends AbstractController
{
    /**
     * @Route("/", name="annonce_index", methods={"GET"})
     */
    public function index(AnnonceRepository $annonceRepository): Response
    {
        return $this->render('annonce/index.html.twig', [
            'annonces' => $annonceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="annonce_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) { 
            $annonce->setDateCreation(new \DateTime());
            // upload des images
            for($i=1; $i<6; $i++) {
                $image = "image".$i."Upload";
                if (!$annonce->$image) break;
                $objUploadedFile = $annonce->$image;
                // ON VA DEPLACER LE FICHIER UPLOADE DANS LE DOSSIER assets/upload/
                // AJOUTER LE CHEMIN DANS config/services.yaml
                // parameters:
                //     monDossierUpload: '%kernel.project_dir%/public/assets/upload'
                $dossierCible = $this->getParameter('monDossierUpload');
    
                // A PARTIR D'ICI ON COMMENCE A AVOIR UN CODE COMMUN POUR GERER L'UPLOAD
                $nomOrigine = $this->imageUpload($objUploadedFile, $dossierCible);
                $setImage= "setImage$i";
                // on ajoute le chemin vers l image pour la query SQL
                $annonce->$setImage("assets/upload/$nomOrigine");
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

            return $this->redirectToRoute('annonce_index');
        }

        return $this->render('annonce/new.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }

    public function imageUpload($objUploadedFile, $dossierCible)
    {
        dump($this);

        $nomOrigine       = $objUploadedFile->getClientOriginalName();
        $extensionOrigine = strtolower($objUploadedFile->getClientOriginalExtension());
        // $extensionOrigine = strtolower(pathinfo($nomOrigine, PATHINFO_EXTENSION));
        dump($extensionOrigine);
        $tabExtensionOK = [ "jpg", "jpeg", "gif", "png" ];
        if (in_array($extensionOrigine, $tabExtensionOK))
        {
            // IMPORTANT: AJOUTER LA SECURITE SUR LA VERIF DU FICHIER (pas de .php)
            // ON VA DEPLACER LE FICHIER UPLOADE DANS LE DOSSIER assets/upload/
            // AJOUTER LE CHEMIN DANS config/services.yaml
            // parameters:
            //     monDossierUpload: '%kernel.project_dir%/public/assets/upload'
            $objUploadedFile->move($dossierCible, $nomOrigine);
            // ICI IL FAUDRAIT CREER LES MINIATURES
        }
        else
        {
            // ERREUR SUR L'UPLOAD
            $nomOrigine = "";
        }
        
        return $nomOrigine;
    }

    /**
     * @Route("/{id}", name="annonce_show", methods={"GET"})
     */
    public function show(Annonce $annonce): Response
    {
        return $this->render('annonce/show.html.twig', [
            'annonce' => $annonce,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="annonce_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Annonce $annonce): Response
    {
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('annonce_index', [
                'id' => $annonce->getId(),
            ]);
        }

        return $this->render('annonce/edit.html.twig', [
            'annonce' => $annonce,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="annonce_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Annonce $annonce): Response
    {
        if ($this->isCsrfTokenValid('delete'.$annonce->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($annonce);
            $entityManager->flush();
        }

        return $this->redirectToRoute('annonce_index');
    }
}
