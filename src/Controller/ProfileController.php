<?php

namespace App\Controller;

use App\Form\AccountPasswordType;
use App\Form\AccountType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profil', name: 'profile_')]
class ProfileController extends AbstractController
{
    #[Route('/', name: 'edit')]
    public function editProfil(Request $request, EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser(); // Récupérer l'utilisateur connecté

        // Créer le formulaire en passant l'utilisateur comme données
        $form = $this->createForm(AccountType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Mise à jour des données de l'utilisateur
            $entityManager->persist($user);;
            $entityManager->flush(); // Sauvegarde les modifications dans la base de données

            $this->addFlash('success', 'Vos informations ont été mises à jour avec succès !');
            return $this->redirectToRoute('main');
        }

        return $this->render('profile/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/edit-pwd', name: 'edit_password')]
    public function editPassword(Request $request, EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser(); // Récupérer l'utilisateur connecté

        // Créer le formulaire en passant l'utilisateur comme données
        $formModifyPassword = $this->createForm(AccountPasswordType::class, $user);

        $formModifyPassword->handleRequest($request);

        if ($formModifyPassword->isSubmitted() && $formModifyPassword->isValid()) {
            // Mise à jour des données de l'utilisateur
            $entityManager->persist($user);;
            $entityManager->flush(); // Sauvegarde les modifications dans la base de données

            $this->addFlash('success', 'Votre mot de passe a bien modifier !');
            return $this->redirectToRoute('main');
        }

        return $this->render('profile/edit_password.html.twig', [
            'formModifyPassword' => $formModifyPassword->createView()
        ]);
    }

    #[Route('/commandes', name: 'orders')]
    public function orders(): Response
    {
        return $this->render('profile/edit.html.twig', [
            'controller_name' => 'Commande de l\'utilisateur',
        ]);
    }
}
