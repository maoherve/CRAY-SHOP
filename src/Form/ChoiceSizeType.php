<?php

namespace App\Form;

use App\Entity\Declinaison;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoiceSizeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('taille', ChoiceType::class, array(
                'choices'  => array(
                    'L' => 'L',
                    'S' => 'S',
                    'M' => 'M',
                ),
                // *this line is important*
                'choices_as_values' => true,))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Declinaison::class,
        ]);
    }
}
