<?php

namespace App\Form;

use App\Entity\Satisfaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SatisfactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('site')
            ->add('trimestre')
            ->add('satis_globale')
            ->add('satis_proprete')
            ->add('competence_du_personnel')
            ->add('temperature_douche')
            ->add('satis_horaires')
            ->add('repondant')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Satisfaction::class,
        ]);
    }
}
