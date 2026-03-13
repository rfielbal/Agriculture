<?php

namespace App\Controller;

use App\Form\DateType;
use App\Entity\Date;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
	#[Route('/date', name: 'app_date')]
	public function date(Request $request, EntityManagerInterface $em): Response
	{
		$date = new Date();
		$form = $this->createForm(DateType::class,$date);

		if($request->isMethod('POST')){
			$form->handleRequest($request);
			if($form->isSubmitted()&&$form->isValid()){
				$em->persist($date);
				$em->flush();
				$this->addFlash('notice','Formulaire envoyé');
				return $this->redirectToRoute('app_date');
			}
		};
		return $this->render('base/index.html.twig', [
			'form' => $form->createView
		]);
	}
}