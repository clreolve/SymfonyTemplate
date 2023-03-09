<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserRegistroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class)
            //->add('roles')
            ->add('nombre', NotBlank::class)
            ->add('apellido',NotBlank::class)
            ->add('tipo', ChoiceType::class,array(
                'choices'  => [
                    'Supervisor' => 'SUPERVISOR',
                    'Vendedor' => 'VENDEDOR',
                    'Cliente' => 'CLIENTE',
                ],
                'constraints' => [
                    'message' => 'Este campo es requerido'
                ]
                )
                )
            //->add('activo')
            ->add('password', PasswordType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
