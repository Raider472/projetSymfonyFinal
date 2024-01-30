<?php

namespace App\Controller;

use App\Repository\FactionRepository;
use App\Repository\FigurineRepository;
use App\Repository\PaintRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function accueil(): Response
    {
        return $this->render('accueil.html.twig', [
        ]);
    }

    #[Route('/tableauDeBord', name: 'tableauDeBord')]
    public function tableauDeBord(PaintRepository $paintRepository, FigurineRepository $figurineRepository, FactionRepository $factionRepository): Response
    {
        $paints = $paintRepository->findAll();
        $figurines = $figurineRepository->findAll();
        $factions = $factionRepository->findAll();

        return $this->render('tableauBord.html.twig', [
            'figurines' => $figurines,
            'paints' => $paints,
            'factions' => $factions,
        ]);
    }
}
