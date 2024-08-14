<?php

namespace App\Controller;

use App\Entity\Ingredient;
use App\Form\IngredientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DefaultController extends AbstractController
{
    #[Route('/home', name: 'default.home')]
    public function index(Ingredient $ingredient): Response
    {
        $form = $this->createForm(IngredientType::class, $ingredient);
        return $this->render('default/index.html.twig', [
            'controller_name' => 'BlogController',
            'form' => $form
        ]);
    }

    ##[Route('/about', name: 'default.about')]
    public function about(): Response
    {
        return new Response("Page About");
    }
}
