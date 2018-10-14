<?php

namespace App\Form;

use App\Entity\Toy;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ToyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', [
                'label' => 'Nom du produit'
            ])
            ->add('description')
            ->add('size')
            ->add('price')
            ->add('category')
            ->add('mater')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Toy::class,
        ]);
    }
}
