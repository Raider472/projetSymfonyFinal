<?php

namespace App\Controller;

use App\Entity\Paint;
use App\Form\PaintType;
use App\Repository\PaintRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/inspectionPeinture/{id}', name: 'inspectionPeinture')]
    public function inspectionPaint(string $id, PaintRepository $paintRepository): Response
    {
        $paint = $paintRepository->findOneBy(["id" => $id]);

        return $this->render('paintInspection.html.twig', [
            "paint" =>  $paint,
        ]);
    }

    #[Route('/peintureAjout', name: 'creationPeinture')]
    public function ajoutFigurine(Request $request, EntityManagerInterface $em): Response {
        
        $paint = new Paint();
        $form = $this->createForm(PaintType::class, $paint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($paint);
            $em->flush();
     
            $this->addFlash('success', 'Peinture créé!');
            return $this->redirectToRoute('accueil');
        }

        return $this->render('ajoutPaint.html.twig', [
            'paint' => $paint,
            'formulaire' => $form->createView()
        ]);
    }

    #[Route('/peintureSupression/{id}', name: 'suppressionPeinture')]
    public function suppressionFigurine(string $id, EntityManagerInterface $em, PaintRepository $peintureRepository): Response {
        
        $paint = $peintureRepository->findOneBy(["id" => $id]);

        $em->remove($paint);
        $em->flush();
        $this->addFlash('success', 'Peinture suprimé!');

        return $this->redirectToRoute('accueil');
    }

    #[Route('/peintureModification/{id}', name: 'modificationPeinture')]
    public function modificationVetement(string $id, EntityManagerInterface $em, PaintRepository $peintureRepository, Request $request): Response {
        
        $paint = $peintureRepository->findOneBy(["id" => $id]);
        $form = $this->createForm(PaintType::class, $paint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
     
            $this->addFlash('success', 'Peinture modifié!');
            return $this->redirectToRoute('accueil');
        }

        return $this->render('ajoutPaint.html.twig', [
            'paint' => $paint,
            'formulaire' => $form->createView()
        ]);
    }
}
