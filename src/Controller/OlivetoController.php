<?php

namespace App\Controller;

use App\Entity\Oliveto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OlivetoController extends AbstractController
{
    #[Route('/oliveto', name: 'oliveto')]
    public function index(): Response
    {
        $oliveto = $this->getDoctrine()
            ->getRepository(Oliveto::class)
            ->findAll();

        return $this->render('oliveto/index.html.twig', [
            'olivetos' => $oliveto,
        ]);
    }

    /**
     * @Route("/oliveto/{code}", name="oliveto_show")
     */
    public function show(string $code)
    {
        $oliveto = $this->getDoctrine()
            ->getRepository(Oliveto::class)
            ->findBy(['code'=>$code]);

        if (!$oliveto) {
            throw $this->createNotFoundException(
                'No tree found for code '.$code
            );
        }

        // return new Response('Check out this great product: '.$oliveto->getName());
        return $this->render('oliveto/show.html.twig', ['olivos' => $oliveto]);

        // or render a template
        // in the template, print things with {{ product.name }}
        // return $this->render('product/show.html.twig', ['product' => $product]);
    }
}
