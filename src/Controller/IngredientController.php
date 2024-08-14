<?php
namespace App\Controller;

use App\Entity\Ingredient;
use App\Form\IngredientType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class IngredientController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    // Injection de l'EntityManagerInterface via le constructeur
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/ingrédient', name: 'ingrédient')]
    public function new(Request $request): Response
    {
        $ingredient = new Ingredient();
        $form = $this->createForm(IngredientType::class, $ingredient);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($ingredient);
            $this->entityManager->flush();

            return $this->redirectToRoute('ingrédient');
        }

        return $this->render('ingredient/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
