<?php

namespace App\Form;

use App\Entity\PlanCommunication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PlanCommunicationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type_operation')
            ->add('date_debut')
            ->add('date_de_fin')
            ->add('cible')
            ->add('objectif')
            ->add('offre')
            ->add('cout_com_interne')
            ->add('cout_com_externe')
            ->add('frais_organisation')
            ->add('participation_partenaire')
            ->add('cout_total')
            ->add('pass')
            ->add('chiffre_affaire')
            ->add('roi')
            ->add('mois')
            ->add('annee')
            ->add('enregistrer', SubmitType::class, [
                'attr' => ['class' => 'bg-danger text-white w-50 mt-5 mb-5'],
                'row_attr' => ['class' => 'text-center']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PlanCommunication::class,
        ]);
    }
}
