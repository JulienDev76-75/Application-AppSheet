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
                'label' => "nom de l'emplacement de l'équipement :"
            ])
            ->add('type_contrat', null, [
                'label' => "nom du type de contrat (Affermage, Marché Service, Régie Interne) :"
            ])
            ->add('type_societe', null, [
                'label' => "nom du type de société (FILL ou OPA) :"
            ])
            ->add('raison_sociale', null, [
                'label' => "nom de la raison sociale :"
            ])
            ->add('nom_du_site', null, [
                'label' => "nom du site :"
            ])
            ->add('adresse1', null, [
                'label' => "l'adresse du site :"
            ])
            ->add('adresse2', null, [
                'label' => "adresse complémentaire optionnelle :"
            ])
            ->add('code_postal', null, [
                'label' => "le code postal du site:"
            ])
            ->add('date_debut', null, [
                'label' => "date de début:"
            ])
            ->add('date_fin', null, [
                'label' => "date de fin :"
            ])
            ->add('date_premier_contrat', null, [
                'label' => "date de premier contrat :"
            ])
            ->add('ctrl_acces', null, [
                'label' => "nom de la personne qui a accès:"
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
