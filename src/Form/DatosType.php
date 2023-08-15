<?php

namespace App\Form;

use App\Entity\Datos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class DatosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nombre')
            ->add('Clasificacion', ChoiceType::class, [
                'choices' => [
                    'Trabajo' => 'Trabajo',
                    'Escuela' => 'Escuela',
                    'Activación Fisica' => 'Activación Fisica',
                    'Servicio Social' => 'Servicio Social' ]])
            ->add('fechainicio')
            ->add('fechacierre')
            ->add('descripcion')

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Datos::class,
        ]);
    }
}
