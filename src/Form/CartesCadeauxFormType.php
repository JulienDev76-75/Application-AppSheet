<?php

namespace App\Form;

use App\Entity\CartesCadeaux;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class CartesCadeauxFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mois', null, [
                'label' => '(Veuillez mettre le mois correspondant aux chiffres de vente des cartes cadeaux de votre site) :',
            ])
            ->add('annee', null, [
                'label' => '(Veuillez mettre l\'année correspondante aux chiffres de vente des cartes cadeaux de votre site) :',
            ])
            ->add('nombre_cartes_vendues', NumberType::class,)
            ->add('valorisation_ventes', NumberType::class,)
            ->add('nombre_carte_utilisees', NumberType::class,)
            ->add('valorisation_utilisation', NumberType::class,)
            ->add('solde', NumberType::class,)
            ->add('enregistrer', SubmitType::class, [
                'attr' => ['class' => 'bg-danger text-white w-50 mt-5 mb-5'],
                'row_attr' => ['class' => 'text-center']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CartesCadeaux::class,
        ]);
    }
}
