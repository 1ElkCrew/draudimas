<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;


class SutartisType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('firmName', TextType::class)
                ->add('money', MoneyType::class)
                ->add('inputDate', DateType::class, [
                    'format' => 'yyyy-MM-dd',
                ])
                ->add('termin', IntegerType::class, [
                    'constraints' => [
                        new Range([
                            'min' => 5,
                            'minMessage' => '',
                        ])
                    ]
                ])
                ->add('status', ChoiceType::class, [
                    'choices' => [
                        'Veikia' => 0,
                        'Tuoj baigsis' => 1,
                        'Baigesi' => 2,
                        'Atsauktas' => 3,
                    ]
                ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver) {

    }

    public function getName(){
        return 'app_bundle_sutartis_type';
    }
}