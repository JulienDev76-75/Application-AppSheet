<?php

namespace App\Form;

use App\Entity\Swot;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class SwotType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('site', TextType::class, [
                'attr' => [
                    'placeholder' => 'Rentrez de préférence le format Ville - Nom du site'
                ]
            ])
            ->add('annee', NumberType::class, [
                'attr' => [
                    'placeholder' => "Rentrez l'année de création de l'équipement"
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez rentrer une année',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Vous devez saisir une année valide',
                        'max' => 4,
                    ]),
                ],
            ])
            ->add('forces', TextType::class)
            ->add('faiblesses', TextType::class)
            ->add('opportunites', TextType::class)
            ->add('menaces', TextType::class)
            ->add('enregistrer', SubmitType::class, [
                'attr' => ['class' => 'bg-danger text-white w-50 mt-5 mb-5'],
                'row_attr' => ['class' => 'text-center']
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Swot::class,
        ]);
    }
}
