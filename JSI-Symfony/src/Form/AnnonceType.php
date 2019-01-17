<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('equipement')
            ->add('images')
            ->add('type')
            ->add('lieu')
            ->add('surface')
            ->add('loyer')
            ->add('charges')
            ->add('disponibilite')
            ->add('bureaux')
            ->add('openSpace')
            ->add('salleReunion')
            ->add('espaceDetente')
            ->add('accueil')
            ->add('dateCreation')
            ->add('note')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }
}
