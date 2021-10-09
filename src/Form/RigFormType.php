<?php

namespace App\Form;

use App\Entity\Rig;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RigFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('activite', null, [
                'attr' => ['class' => '',
                'placeholder' => "Veuillez choisir entre PISC, PAT ou encore TL"],
                'label' => " Activité du site : "
            ])
            ->add('mois', null, [
                'label' => " Mois : "
            ])
            ->add('annee',null, [
                'label' => " Année : "
            ])
            ->add('chiffre_affaire')
            ->add('frequentation')
            ->add('panier_moyen', NumberType::class)
            ->add('enregistrer', SubmitType::class, [
                'attr' => ['class' => 'bg-danger text-white w-50 mt-3 mb-5'],
                'row_attr' => ['class' => 'text-center']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Rig::class,
        ]);
    }
}
