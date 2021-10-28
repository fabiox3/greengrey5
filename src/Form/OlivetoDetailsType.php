<?php

namespace App\Form;

use App\Entity\OlivetoDetails;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OlivetoDetailsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('categoria', ChoiceType::class, [
                'choices'  => [
                    'Produttività'  => 'Produttività',
                    'Potatura'      => 'Potatura',
                    'Trattamento'   => 'Trattamento',
                ],
            ])
            ->add('note')
            ->add('data')
            ->add('rating')
            ->add('code')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OlivetoDetails::class,
        ]);
    }


}
