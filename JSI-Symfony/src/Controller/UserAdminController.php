<?php

namespace App\Controller;

use App\Entity\UserAdmin;
use App\Form\UserAdminType;
use App\Repository\UserAdminRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/useradmin")
 */
class UserAdminController extends AbstractController
{
    /**
     * @Route("/", name="user_admin_index", methods={"GET"})
     */
    public function index(UserAdminRepository $userAdminRepository): Response
    {
        return $this->render('user_admin/index.html.twig', [
            'user_admins' => $userAdminRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="user_admin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $userAdmin = new UserAdmin();
        $form = $this->createForm(UserAdminType::class, $userAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userAdmin);
            $entityManager->flush();

            return $this->redirectToRoute('user_admin_index');
        }

        return $this->render('user_admin/new.html.twig', [
            'user_admin' => $userAdmin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_admin_show", methods={"GET"})
     */
    public function show(UserAdmin $userAdmin): Response
    {
        return $this->render('user_admin/show.html.twig', [
            'user_admin' => $userAdmin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="user_admin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UserAdmin $userAdmin): Response
    {
        $form = $this->createForm(UserAdminType::class, $userAdmin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_admin_index', [
                'id' => $userAdmin->getId(),
            ]);
        }

        return $this->render('user_admin/edit.html.twig', [
            'user_admin' => $userAdmin,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="user_admin_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UserAdmin $userAdmin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$userAdmin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($userAdmin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_admin_index');
    }
}
