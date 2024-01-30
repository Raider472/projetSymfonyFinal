<?php

namespace App\Controller;

use App\Entity\Army;
use App\Form\Type\ArmyType;
use App\Repository\ArmyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArmyController extends AbstractController
{
    #[Route('/armeeAjout', name: 'creationArmee')]
    public function armeeAjout(Request $request, EntityManagerInterface $em): Response
    {
        $army = new Army();
        $form = $this->createForm(ArmyType::class, $army);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getUser();
            $army->setUser($user);

            $em->persist($army);
            $em->flush();

            $this->addFlash('success', 'Liste créé!');

            return $this->redirectToRoute('accueil');
        }

        return $this->render('creationListe.html.twig', [
            'army' => $army,
            'formulaire' => $form->createView(),
        ]);
    }

    #[Route('/affichageListe', name: 'affichageListe')]
    public function affichageListe(ArmyRepository $armyRepository): Response
    {
        $army = $armyRepository->findBy(['user' => $this->getUser()]);

        return $this->render('afichageListe.html.twig', [
            'armies' => $army,
        ]);
    }

    #[Route('/listeInspection/{id}', name: 'listeInspection')]
    public function inspectionFigurine(string $id, ArmyRepository $armyRepository): Response
    {
        $army = $armyRepository->findOneBy(['id' => $id]);

        return $this->render('armyinspection.html.twig', [
            'army' => $army,
        ]);
    }

    #[Route('/listeSupression/{id}', name: 'suppressionListe')]
    public function suppressionFigurine(string $id, EntityManagerInterface $em, ArmyRepository $armyRepository): Response
    {
        $army = $armyRepository->findOneBy(['id' => $id]);

        $em->remove($army);
        $em->flush();
        $this->addFlash('success', 'Liste suprimé!');

        return $this->redirectToRoute('affichageListe');
    }
}
