<?php

namespace App\Form;

use App\Entity\Satisfaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class SatisfactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('trimestre', TextType::class, [
                'attr' => ['class' => '',
                'placeholder' => "Veuillez mettre T1, T2, T3 ou T4"],
                'label' => " Trimestre : "
            ])
            ->add('satis_globale', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez rentrer un chiffre, pas besoin de mettre de %',
                    ]),
                ],
            ])
            ->add('satis_proprete', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez rentrer un chiffre, pas besoin de mettre de %',
                    ]),
                ],
            ])
            ->add('competence_du_personnel', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez rentrer un chiffre, pas besoin de mettre de %',
                    ]),
                ],
            ])
            ->add('temperature_douche', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez rentrer un chiffre, pas besoin de mettre de %',
                    ]),
                ],
            ])
            ->add('satis_horaires', NumberType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez rentrer un chiffre, pas besoin de mettre de %',
                    ]),
                ],
            ])
            ->add('repondant', NumberType::class, [
                'label' => 'Veuillez indiquer le nombre de répondants pour cette enquête de satisfaction'
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
            'data_class' => Satisfaction::class,
        ]);
    }
}
