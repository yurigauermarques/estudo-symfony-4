<?php

namespace App\Form;

use App\Entity\ProdutoCategoria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProdutoCategoriaType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, [
                'label' => 'Nome',
            ])
            ->add('situacao', ChoiceType::class, [
                'label' => 'Situação',
                'choices' => [
                    'Ativa' => 'ativa',
                    'Inativa' => 'inativa',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProdutoCategoria::class,
        ]);
    }
}
