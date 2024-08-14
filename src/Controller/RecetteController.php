<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class RecetteController extends AbstractController
{
    #[Route('/recette', name: 'app_recette')]
    public function index(): Response
    {
        $recettes = [
            [
                "id" => 1,
                "nom" => "lazania"
            ]
        ];
        return $this->render('recette/index.html.twig', [
            'controller_name' => 'RecetteController',
            "recettes" => $recettes
        ]);
    }
}
