<?php
namespace Acme\StoreBundle\Form;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          -> add('name', TextType::class)
          ->add('price', MoneyType::class)
          ->add('guardar', SubmitType::class, array('label' => 'Crear'));

        ;
    }
}

 ?>
