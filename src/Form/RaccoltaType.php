<?php

namespace App\Form;

use App\Entity\Raccolta;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RaccoltaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('kg_olive')
            ->add('kg_olio')
            ->add('resa_lt_qt')
            ->add('litri_teorici')
            ->add('litri_reali')
            ->add('data')
            ->add('spesa')
            ->add('anno')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Raccolta::class,
        ]);
    }
}
