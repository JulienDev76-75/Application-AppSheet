<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom_nom', TextType::class, [
                'attr' => ['class' => 'mb-4 ms-4 rounded'],
                'label' => 'Prénom et nom   :'
            ])
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'mb-4 ms-4 rounded'],
                'label' => "Email :"
            ])
            ->add('poste', TextType::class, [
                'attr' => ['class' => 'mb-4 ms-4 rounded'],
                'label' => 'Poste :'
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'attr' => ['class' => 'mb-4 ms-4 rounded'],
                'row_attr' => ['class' => 'mb-4 rounded'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez rentrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères dont une Majuscule, deux Numéros et un caractère spécial',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('enregistrer', SubmitType::class, [
                'attr' => ['class' => 'bg-success text-white mb-5 mt-4'],
                'row_attr' => ['class' => 'text-center']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
