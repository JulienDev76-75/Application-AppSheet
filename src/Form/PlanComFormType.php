<?php

namespace App\Form;

use App\Entity\PlanCommunication;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlanComFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('validation_sophie')
            ->add('type_activite')
            ->add('type_contrat')
            ->add('date_debut')
            ->add('date_de_fin')
            ->add('periode')
            ->add('type_operation')
            ->add('operation_nationale')
            ->add('cible')
            ->add('objectif')
            ->add('offre')
            ->add('cout_com_interne')
            ->add('cout_com_externe')
            ->add('frais_organisation')
            ->add('participation_partenaire')
            ->add('cout_total')
            ->add('pass')
            ->add('cartes')
            ->add('chiffre_affaire')
            ->add('roi')
            ->add('numero_ddc')
            ->add('photo')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PlanCommunication::class,
        ]);
    }
}
