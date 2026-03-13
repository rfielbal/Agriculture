<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ParcelleRepository;

final class ParcelleController extends AbstractController
{
    #[Route('/liste-parcelle', name: 'app_liste_parcelles')]
    public function listeParcelle(ParcelleRepository $ParcelleRepository): Response
    {
        $parcelles = $ParcelleRepository->findAll();
        return $this->render('parcelle/index.html.twig', [
            'parcelles' => 'ParcelleController',
        ]);
    }
}
