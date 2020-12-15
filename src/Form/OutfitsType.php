<?php

namespace App\Form;

use App\Entity\Outfits;
use Symfony\Component\DomCrawler\Field\TextareaFormField;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class OutfitsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('image_name', TextType::class, ['label' => 'Nom de l\'image'])
            ->add('price', TextType::class, ['label' => 'Prix'])
            ->add('quantity', TextType::class, ['label' => 'Quantité'])
            ->add('imageFile', VichImageType::class, [
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
            'data_class' => Outfits::class,
        ]);
    }
}
