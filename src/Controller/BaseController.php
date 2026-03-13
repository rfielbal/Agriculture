<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ParcelleType;
use App\Entity\Parcelle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends AbstractController
{
	#[Route('/', name: 'app_accueil')]
	public function index(): Response
	{
		return $this->render('base/index.html.twig', [
		]);
	}

#[Route('/parcelle', name: 'app_parcelle')]
	public function parcelle(Request $request, EntityManagerInterface $em): Response
	{
		$parcelle = new Parcelle();
		$form = $this->createForm(ParcelleType::class, $parcelle);
		if($request->isMethod('POST')){
			$form->handleRequest($request);
			if ($form->isSubmitted()&&$form->isValid()){
				$em->persist($parcelle);	
				$em->flush();	
				$this->addFlash('notice','Message envoyé'); 
				return $this->redirectToRoute('app_contact');
			}
		}
		return $this->render('base/parcelle.html.twig', [
		'form' => $form->createView()
	]);
}
}
