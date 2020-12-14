<?php

namespace App\Form;

use App\Entity\Declinaison;
use App\Entity\Outfits;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class DeclinaisonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('taille')
            ->add('quantite')
            ->add('outfits',null, ['choice_label' => 'description'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Declinaison::class,
        ]);
    }
}
