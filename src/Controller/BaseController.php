<?php

namespace App\Controller;

use App\Form\UniteType;
use App\Entity\Unite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType; 

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ParcelleType;
use App\Entity\Parcelle;


class BaseController extends AbstractController
{
	#[Route('/', name: 'app_accueil')]
	public function index(): Response
	{
		return $this->render('base/index.html.twig', [
		]);
	}


	#[Route('/Unite', name: 'app_unite')]
    public function Unite (Request $request, EntityManagerInterface $em): Response
    {
        $Unite = new Unite(); /*avec la première lettre en majuscule pour le deuxième nom*/
        $form = $this->createForm(UniteType::class,$Unite);

        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
                $em->persist($Unite);
                $em->flush();
                $this->addFlash('notice','Formulaire envoyé');
                return $this->redirectToRoute('app_unite');
            }
        }
        return $this->render('base/unite.html.twig', [
            'form' => $form->createView()
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

