<?php

namespace App\Form;

use App\Entity\UrPolicy;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UrPolicyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', \Symfony\Component\Form\Extension\Core\Type\TextType::class, ['label'=>'Titre'])
            ->add('text', \Symfony\Component\Form\Extension\Core\Type\TextType::class, ['label' => 'Texte'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UrPolicy::class,
        ]);
    }
}
