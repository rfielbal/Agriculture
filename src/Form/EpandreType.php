<?php

namespace App\Form;

use App\Entity\Date;
use App\Entity\Engrais;
use App\Entity\Epandre;
use App\Entity\Parcelle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\EmailType; 
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Form\EpandreType;

class EpandreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('qteEpendu')
            ->add('engrais', EntityType::class, [
                'class' => Engrais::class,
                'choice_label' => 'id',
            ])
            ->add('parcelle', EntityType::class, [
                'class' => Parcelle::class,
                'choice_label' => 'id',
            ])
            ->add('date', EntityType::class, [
                'class' => Date::class,
                'choice_label' => 'id',
            ])
            ->add('epandre', EntityType::class, [
                'class' => Epandre::class,
                'choice_label' => 'id',
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Epandre::class,
        ]);
    }
}
