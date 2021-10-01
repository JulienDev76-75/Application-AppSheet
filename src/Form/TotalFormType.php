<?php

namespace App\Form;

use App\Entity\Total;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TotalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('satis_globale')
            ->add('satis_proprete')
            ->add('satis_horaire')
            ->add('temperature_douche')
            ->add('competence_personnel')
            ->add('trimestre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Total::class,
        ]);
    }
}
