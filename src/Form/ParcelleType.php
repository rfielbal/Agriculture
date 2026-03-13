<?php

namespace App\Form;

use App\Entity\Parcelle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ParcelleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('surface', MoneyType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=>'fw-bold']])
            ->add('nomParcelle', TextType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=>'fw-bold']])
            ->add('coordonnees', TextType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=>'fw-bold']])
            ->add('envoyer', SubmitType::class, ['attr' => ['class'=> 'btn bg-primary text-white m-4' ],'row_attr' => ['class' => 'text-center'],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Parcelle::class,
        ]);
    }
}
