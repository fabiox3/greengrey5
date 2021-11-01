<?php

namespace App\Controller;

use App\Entity\Oliveto;
use App\Entity\OlivetoDetails;
use App\Form\OlivetoDetailsType;
use App\Repository\OlivetoDetailsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

#[Route('/details')]
class OlivetoDetailsController extends AbstractController
{
    #[Route('/', name: 'oliveto_details_index', methods: ['GET'])]
    public function index(OlivetoDetailsRepository $olivetoDetailsRepository): Response
    {
        return $this->render('oliveto_details/index.html.twig', [
            'oliveto_details' => $olivetoDetailsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'oliveto_details_new', methods: ['GET','POST'])]
    public function new(Request $request): Response
    {
        $o_list = [];
        $oliveto = $this->getDoctrine()
            ->getRepository(Oliveto::class)
            ->findAll();

        for( $i=0; $i<count($oliveto); $i++ ) {
            if( $oliveto[$i]->getCode() == $request->get('code') ) {
                $o_list = [
                    'id'=>$oliveto[$i]->getId(),
                    'code'=>$oliveto[$i]->getCode()
                ];
            }
        }

        $c = $this->getDoctrine()->getRepository(Oliveto::class)->findBy(['code'=>$o_list['code']]);

        $olivetoDetail = new OlivetoDetails();
        $formbuilder = $this->createFormBuilder($olivetoDetail)
            ->add('categoria', ChoiceType::class, [
                'choices'  => [
                    'Produttività'  => 'Produttività',
                    'Potatura'      => 'Potatura',
                    'Trattamento'   => 'Trattamento',
                ],
            ])
            ->add('note')
            ->add('data')
            ->add('rating', ChoiceType::class, [
                'choices'=> [
                    '1 stella' => 1,
                    '2 stelle' => 2,
                    '3 stelle' => 3,
                    '4 stelle' => 4,
                    '5 stelle' => 5,
                ],
                'multiple'=>false,
                'expanded'=>true
            ])
            ->add('code');
        $form = $formbuilder->getForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($olivetoDetail);
            $entityManager->flush();

            return $this->redirectToRoute('oliveto_details_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oliveto_details/new.html.twig', [
            'oliveto_detail' => $olivetoDetail,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'oliveto_details_show', methods: ['GET'])]
    public function show(OlivetoDetails $olivetoDetail): Response
    {
        return $this->render('oliveto_details/show.html.twig', [
            'oliveto_detail' => $olivetoDetail,
        ]);
    }

    #[Route('/{id}/edit', name: 'oliveto_details_edit', methods: ['GET','POST'])]
    public function edit(Request $request, OlivetoDetails $olivetoDetail): Response
    {
        $form = $this->createForm(OlivetoDetailsType::class, $olivetoDetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('oliveto_details_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oliveto_details/edit.html.twig', [
            'oliveto_detail' => $olivetoDetail,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'oliveto_details_delete', methods: ['POST'])]
    public function delete(Request $request, OlivetoDetails $olivetoDetail): Response
    {
        if ($this->isCsrfTokenValid('delete'.$olivetoDetail->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($olivetoDetail);
            $entityManager->flush();
        }

        return $this->redirectToRoute('oliveto_details_index', [], Response::HTTP_SEE_OTHER);
    }
}
