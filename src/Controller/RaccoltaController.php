<?php

namespace App\Controller;

use App\Entity\Raccolta;
use App\Form\RaccoltaType;
use App\Repository\RaccoltaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/raccolta')]
class RaccoltaController extends AbstractController
{
    #[Route('/', name: 'raccolta_index', methods: ['GET'])]
    public function index(RaccoltaRepository $raccoltaRepository): Response
    {
        return $this->render('raccolta/index.html.twig', [
            'raccoltas' => $raccoltaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'raccolta_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $raccoltum = new Raccolta();
        $form = $this->createForm(RaccoltaType::class, $raccoltum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($raccoltum);
            $entityManager->flush();

            return $this->redirectToRoute('raccolta_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('raccolta/new.html.twig', [
            'raccoltum' => $raccoltum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'raccolta_show', methods: ['GET'])]
    public function show(Raccolta $raccoltum): Response
    {
        return $this->render('raccolta/show.html.twig', [
            'raccoltum' => $raccoltum,
        ]);
    }

    #[Route('/{id}/edit', name: 'raccolta_edit', methods: ['GET','POST'])]
    public function edit(Request $request, Raccolta $raccoltum): Response
    {
        $form = $this->createForm(RaccoltaType::class, $raccoltum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('raccolta_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('raccolta/edit.html.twig', [
            'raccoltum' => $raccoltum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'raccolta_delete', methods: ['POST'])]
    public function delete(Request $request, Raccolta $raccoltum): Response
    {
        if ($this->isCsrfTokenValid('delete'.$raccoltum->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($raccoltum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('raccolta_index', [], Response::HTTP_SEE_OTHER);
    }
}
