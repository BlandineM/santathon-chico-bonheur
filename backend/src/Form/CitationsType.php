<?php

namespace App\Form;

use App\Entity\Authors;
use App\Entity\Citations;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CitationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('resume')
            ->add('author', EntityType::class,
                [
                    'class' => Authors::class,
                    'multiple' => false,
                    'expanded' => false,
                    'choice_label' => 'auth_name',
                ])
            ->add('scoreCit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Citations::class,
        ]);
    }
}
