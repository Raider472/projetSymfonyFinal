<?php

namespace App\Controller;

use App\Entity\Figurine;
use App\Form\Type\FigurineFormType;
use App\Repository\FigurineRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/figurineAjout', name: 'creationFigurine')]
    public function ajoutFigurine(Request $request, EntityManagerInterface $em): Response
    {
        $figurine = new Figurine();
        $form = $this->createForm(FigurineFormType::class, $figurine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $figurine->getImage()->setName($figurine->getName());
            $figurine->getStats()->setName($figurine->getName());

            $em->persist($figurine);
            $em->flush();

            $this->addFlash('success', 'Figurine créé!');

            return $this->redirectToRoute('accueil');
        }

        return $this->render('ajoutFigurine.html.twig', [
            'figurine' => $figurine,
            'formulaire' => $form->createView(),
        ]);
    }

    #[Route('/figurineInspection/{id}', name: 'figurineInspection')]
    public function inspectionFigurine(string $id, FigurineRepository $figurineRepository): Response
    {
        $figurine = $figurineRepository->findOneBy(['id' => $id]);

        return $this->render('figurineInspection.html.twig', [
            'figurine' => $figurine,
        ]);
    }

    #[Route('/figurineSupression/{id}', name: 'suppressionFigurine')]
    public function suppressionFigurine(string $id, EntityManagerInterface $em, FigurineRepository $figurineRepository): Response
    {
        $figurine = $figurineRepository->findOneBy(['id' => $id]);

        $em->remove($figurine);
        $em->flush();
        $this->addFlash('success', 'Figurine suprimé!');

        return $this->redirectToRoute('accueil');
    }

    #[Route('/figurineModification/{id}', name: 'modificationFigurine')]
    public function modificationVetement(string $id, EntityManagerInterface $em, FigurineRepository $figurineRepository, Request $request): Response
    {
        $figurine = $figurineRepository->findOneBy(['id' => $id]);
        $form = $this->createForm(FigurineFormType::class, $figurine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Figurine modifié!');

            return $this->redirectToRoute('accueil');
        }

        return $this->render('ajoutFigurine.html.twig', [
            'figurines' => $figurine,
            'formulaire' => $form->createView(),
        ]);
    }
}
