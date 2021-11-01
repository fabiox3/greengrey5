<?php

namespace App\Controller;

use App\Entity\Oliveto;
use ContainerF3isgMC\getOlivetoControllerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class OliveTreesListApi extends AbstractController
{
    public function __invoke()
    {
        $api = $this->getDoctrine()
            ->getRepository(Oliveto::class)
            ->findAll();

        if (!$api) {
            throw $this->createNotFoundException(
                'No data found'
            );
        }
        return $api;
    }
}