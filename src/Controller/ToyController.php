<?php

namespace App\Controller;

use App\Entity\Toy;
use App\Form\ToyType;
use App\Repository\ToyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/toy")
 */
class ToyController extends AbstractController
{
    /**
     * @Route("/", name="toy_index", methods="GET")
     */
    public function index(ToyRepository $toyRepository): Response
    {
        return $this->render('toy/index.html.twig', ['toys' => $toyRepository->findAll()]);
    }

    /**
     * @Route("/new", name="toy_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $toy = new Toy();
        $form = $this->createForm(ToyType::class, $toy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($toy);
            $em->flush();

            return $this->redirectToRoute('toy_index');
        }

        return $this->render('toy/new.html.twig', [
            'toy' => $toy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="toy_show", methods="GET")
     */
    public function show(Toy $toy): Response
    {
        return $this->render('toy/show.html.twig', ['toy' => $toy]);
    }

    /**
     * @Route("/{id}/edit", name="toy_edit", methods="GET|POST")
     */
    public function edit(Request $request, Toy $toy): Response
    {
        $form = $this->createForm(ToyType::class, $toy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('toy_edit', ['id' => $toy->getId()]);
        }

        return $this->render('toy/edit.html.twig', [
            'toy' => $toy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="toy_delete", methods="DELETE")
     */
    public function delete(Request $request, Toy $toy): Response
    {
        if ($this->isCsrfTokenValid('delete'.$toy->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($toy);
            $em->flush();
        }

        return $this->redirectToRoute('toy_index');
    }
}
