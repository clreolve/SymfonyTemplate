<?php

namespace App\Form;

use App\Entity\Incidente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class IncidenteCrearType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('descripcion', TextareaType::class, [
                'required' => true,
                'constraints' => [
                    new NotBlank(
                        ['message' => 'campo requerido']
                    )
                ]
            ])
            //->add('solucion')
            //->add('estado')
            //->add('costo')
            ->add(
                'lugar',
                TextType::class,
                [
                    'required' => true,
                    'constraints' => [
                        new NotBlank(
                            ['message' => 'campo requerido']
                        )
                    ]
                ]
            )
            ->add('submit', SubmitType::class)
            //->add('usuario')
            //->add('tipoincidente')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Incidente::class,
        ]);
    }
}
