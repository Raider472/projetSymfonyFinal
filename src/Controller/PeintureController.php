<?php

namespace App\Controller;

use App\Repository\PaintRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PeintureController extends AbstractController
{
    #[Route('/affichagePeinture', name: 'affichagePeinture')]
    public function accueil(PaintRepository $paintRepository): Response
    {
        $paints = $paintRepository->findAll();

        return $this->render('affichagePaint.html.twig', [
            'paints' => $paints,
        ]);
    }
}
