<?php

namespace App\Controller;

use App\Entity\Figurine;
use App\Enum\TypeOfStatus;
use App\Form\Type\FigurineFormType;
use App\Repository\FigurineRepository;
use App\Repository\GunRepository;
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
    public function ajoutFigurine(Request $request, EntityManagerInterface $em, GunRepository $test): Response {
        
        $figurine = new Figurine();
        /*$gun = $test->findAll();
        foreach($gun as $guns) {
            $figurine->addRangedWeapon($guns);
        }*/
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
            'formulaire' => $form->createView()
        ]);
    }
}
