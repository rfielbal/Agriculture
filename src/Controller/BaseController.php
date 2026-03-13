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

use App\Form\ProductionType;
use App\Entity\Production;
use App\Entity\ElementChimique;
use App\Form\ElementChimiqueType;

use App\Entity\Engrais;
use App\Form\EngraisType;

use App\Form\CultureType;
use App\Entity\Culture;


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
					return $this->redirectToRoute('app_parcelle');
				}
			}
			return $this->render('base/parcelle.html.twig', [
			'form' => $form->createView()
		]);
	}


	#[Route('/Element-Chimique', name: 'app_elementChimique')]
		public function ElementChimique(Request $request, EntityManagerInterface $em): Response
		{
			$elementChimique = new ElementChimique();
			$form = $this->createForm(ElementChimiqueType::class, $elementChimique);
			if($request->isMethod('POST')){
				$form->handleRequest($request);
				if ($form->isSubmitted()&&$form->isValid()){
					$em->persist($elementChimique);	
					$em->flush();	
					$this->addFlash('notice','Message envoyé'); 
					return $this->redirectToRoute('app_elementChimique');
				}
			}
			return $this->render('base/elementChimique.html.twig', [
			'form' => $form->createView()
		]);
	}

	#[Route('/Engrais', name: 'app_engrais')]
		public function Engrais(Request $request, EntityManagerInterface $em): Response
		{
			$engrais = new Engrais();
			$form = $this->createForm(EngraisType::class, $engrais);
			if($request->isMethod('POST')){
				$form->handleRequest($request);
				if ($form->isSubmitted()&&$form->isValid()){
					$em->persist($engrais);	
					$em->flush();	
					$this->addFlash('notice','Message envoyé'); 
					return $this->redirectToRoute('app_engrais');
				}
			}
			return $this->render('base/engrais.html.twig', [
			'form' => $form->createView()
		]);
	}



#[Route('/Production', name: 'app_production')]
	public function production(Request $request, EntityManagerInterface $em): Response
	{
		$production = new Production();
		$form = $this->createForm(ProductionType::class, $production);
		
		if($request->isMethod('POST')){
			$form->handleRequest($request);
			if ($form->isSubmitted()&&$form->isValid()){
				$em->persist($production);	
				$em->flush();				
				$this->addFlash('notice','Message envoyé'); 
				return $this->redirectToRoute('app_production'); 
			}
		}
		
		return $this->render('base/production.html.twig', [
			'form' => $form->createView()
		]);
	}

	
	#[Route('/Culture', name: 'app_culture')]
	public function culture(Request $request, EntityManagerInterface $em): Response
	{
		$culture = new Culture();
		$form = $this->createForm(CultureType::class, $culture);
		
		if($request->isMethod('POST')){
			$form->handleRequest($request);
			if ($form->isSubmitted()&&$form->isValid()){
				$em->persist($culture);	
				$em->flush();				
				$this->addFlash('notice','Message envoyé'); 
				return $this->redirectToRoute('app_culture'); 
			}
		}
		
		return $this->render('base/culture.html.twig', [
			'form' => $form->createView()
		]);
	}
} 