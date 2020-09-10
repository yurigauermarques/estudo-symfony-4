<?php

namespace App\Form;

use App\Entity\Produto;
use App\Entity\ProdutoCategoria;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProdutoType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, [
                'label' => 'Nome',
            ])
            ->add('valor', MoneyType::class, [
                'label' => 'Valor',
            ])
            ->add('dataCadastro', DateType::class, [
                'label' => 'Data de cadastro',
                'format' => 'dd/MM/yyyy',
            ])
            ->add('situacao', ChoiceType::class, [
                'label' => 'Situação',
                'choices' => [
                    'Ativo' => 'ativo',
                    'Inativo' => 'inativo',
                ]
            ])
            ->add('produtoCategoria', EntityType::class, [
                'label' => 'Categoria',
                'class' => ProdutoCategoria::class,
                'query_builder' => function (\Doctrine\ORM\EntityRepository $er) {
                    $qb = $er->createQueryBuilder('c');
                    $qb->andWhere($qb->expr()->eq('c.situacao', ':situacao'));
                    $qb->setParameter(':situacao', 'ativa');
                    $qb->orderBy('c.nome', 'ASC');

                    return $qb;
                },
            ])
            ->add('descricao', TextareaType::class, [
                'label' => 'Descrição'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produto::class,
        ]);
    }
}
