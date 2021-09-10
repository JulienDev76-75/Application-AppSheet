<?php

namespace App\Form;

use App\Entity\CartesCadeaux;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CartesCadeauxFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('site')
            ->add('date')
            ->add('nombre_cartes_vendues')
            ->add('valorisation_ventes')
            ->add('nombre_carte_utilisees')
            ->add('valorisation_utilisation')
            ->add('solde')
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
