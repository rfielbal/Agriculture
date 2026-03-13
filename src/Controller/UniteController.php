<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Repository\UniteRepository;

final class UniteController extends AbstractController
{
    #[Route('/liste-unite', name: 'app_liste_unite')]
    public function listeUnite(UniteRepository $UniteRepository): Response
    {
        $unites = $UniteRepository->findAll();
        return $this->render('unite/index.html.twig', [
            'unites' => 'UniteController',
        ]);
    }
}
