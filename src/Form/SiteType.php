<?php

namespace App\Form;

use App\Entity\Sites;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ville', null, [
                'label' => "Ville :"
            ])
            ->add('type_contrat', null, [
                'label' => "Type de contrat (Affermage, Marché Service, Régie Interne) :"
            ])
            ->add('type_societe', null, [
                'label' => "Type de société (FILL ou OPA) :"
            ])
            ->add('raison_sociale', null, [
                'label' => "Raison sociale :"
            ])
            ->add('nom_du_site', null, [
                'label' => "Nom du site :"
            ])
            ->add('adresse1', null, [
                'label' => "Adresse principale :"
            ])
            ->add('adresse2', null, [
                'label' => "Adresse complémentaire :"
            ])
            ->add('code_postal', null, [
                'label' => "Code postal :"
            ])
            ->add('date_debut', null, [
                'label' => "Date de début :"
            ])
            ->add('date_fin', null, [
                'label' => "Date de fin :"
            ])
            ->add('date_premier_contrat', null, [
                'label' => "Date de premier contrat :"
            ])
            ->add('ctrl_acces', null, [
                'label' => "Accès :"
            ])
            ->add('enregistrer', SubmitType::class, [
                'attr' => ['class' => 'bg-danger text-white w-50 mt-3 mb-5'],
                'row_attr' => ['class' => 'text-center']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Sites::class,
        ]);
    }
}
