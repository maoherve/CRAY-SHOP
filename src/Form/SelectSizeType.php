<?php

namespace App\Form;

use App\Entity\Declinaison;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SelectSizeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('taille', [
            'choices'  => [
                'Maybe' => null,
                'Yes' => true,
                'No' => false,
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Declinaison::class,
        ]);
    }
}
