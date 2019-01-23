<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                'required' => false,
            ])
            ->add('description',TextareaType::class)
            ->add('equipement',TextareaType::class)
            ->add('type', TextType::class)
            ->add('lieu', TextType::class)
            ->add('surface', NumberType::class)
            ->add('loyer', NumberType::class)
            ->add('charges', NumberType::class)
            ->add('disponibilite', ChoiceType::class, [
                    'choices' => ['Oui' => 'Oui', 'Non' => 'Non'],
                    ])
            ->add('bureaux', NumberType::class)
            ->add('openSpace', NumberType::class)
            ->add('salleReunion', NumberType::class)
            ->add('espaceDetente', NumberType::class)
            ->add('accueil',ChoiceType::class, [
                    'choices' => ['Non' => 'Non', 'Oui' => 'Oui'],
                    ])
           // ->add('dateCreation')
            ->add('note')
            ->add('image1Upload',FileType::class, [
                'required' => false,
                'data_class' => null
            ])
            ->add('image2Upload',FileType::class, [
                'required' => false,
                'data_class' => null
            ])
            ->add('image3Upload',FileType::class, [
                'required' => false,
                'data_class' => null
            ])
            ->add('image4Upload',FileType::class, [
                'required' => false,
                'data_class' => null
            ])
            ->add('image5Upload',FileType::class, [
                'required' => false,
                'data_class' => null
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
