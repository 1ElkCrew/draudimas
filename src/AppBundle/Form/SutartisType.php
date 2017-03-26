<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;


class SutartisType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('firmName', TextType::class)
                ->add('worker', TextType::class)
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
                        'Galiojanti' => 0,
                        'Sustabdyta' => 1,
                        'Nutraukta' => 2,
                    ]
                ])
                ->add('city', TextType::class, [
                    'required' => false,
                ])
                ->add('contractnum', TextType::class, [
                    'required' => false,
                ])
                ->add('add', SubmitType::class, ['label' => 'Išsaugoti']) //manual twig/html for custom style
            ;
    }

    public function configureOptions(OptionsResolver $resolver) {

    }

    public function getName(){
        return 'app_bundle_sutartis_type';
    }
}