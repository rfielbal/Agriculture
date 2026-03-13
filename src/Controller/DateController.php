<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\DateRepository;

final class DateController extends AbstractController
{
    #[Route('/liste-date', name: 'app_liste_date')]
    public function listeDate(DateRepository $DateRepository): Response
    {
        $dates = $DateRepository->findAll();
        return $this->render('date/index.html.twig', [
            'dates' => 'DateController',
        ]);
    }
}
