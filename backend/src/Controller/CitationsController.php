<?php

namespace App\Controller;

use App\Entity\Citations;
use App\Form\CitationsType;
use App\Repository\CitationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/citations")
 */
class CitationsController extends AbstractController
{
    /**
     * @Route("/", name="citations_index", methods={"GET"})
     */
    public function index(CitationsRepository $citationsRepository): Response
    {
        return $this->render('citations/index.html.twig', [
            'citations' => $citationsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="citations_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $citation = new Citations();
        $form = $this->createForm(CitationsType::class, $citation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($citation);
            $entityManager->flush();

            return $this->redirectToRoute('citations_index');
        }

        return $this->render('citations/new.html.twig', [
            'citation' => $citation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="citations_show", methods={"GET"})
     */
    public function show(Citations $citation): Response
    {
        return $this->render('citations/show.html.twig', [
            'citation' => $citation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="citations_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Citations $citation): Response
    {
        $form = $this->createForm(CitationsType::class, $citation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('citations_index');
        }

        return $this->render('citations/edit.html.twig', [
            'citation' => $citation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="citations_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Citations $citation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$citation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($citation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('citations_index');
    }
}
