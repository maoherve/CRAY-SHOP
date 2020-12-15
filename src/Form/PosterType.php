<?php

namespace App\Form;

use App\Entity\Poster;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PosterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image')
            ->add('poster_name', TextType::class, ['label' => 'Nom'])
            ->add('posterFile', VichImageType::class, [
                'required' => false,
                'download_label' => false,
                'allow_delete' => false,
                'download_uri' => false,
                'image_uri' => false,
                'asset_helper' => false,
                'label' => 'Fichier',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Poster::class,
        ]);
    }
}
