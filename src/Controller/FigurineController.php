<?php

namespace App\Controller;

use App\Repository\FigurineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FigurineController extends AbstractController
{
    #[Route('/affichageFigurine', name: 'affichageFigurine')]
    public function accueil(FigurineRepository $figurineRepository): Response
    {
        $figurines = $figurineRepository->findAll();

        return $this->render('affichageFigurine.html.twig', [
            'figurines' => $figurines,
        ]);
    }
}
