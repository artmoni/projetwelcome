<?php

namespace App\Form;

use App\Entity\Good;
use App\Enum\TypeGoodEnum;
use App\Enum\TypePropertyEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GoodCreationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeGood', ChoiceType::class, array(
                'choices' => TypeGoodEnum::getAvailableTypes(),
                'choice_label' => function ($choice) {
                    return TypeGoodEnum::getTypeName($choice);
                },
            ))
            ->add('typePropertie', ChoiceType::class, array(
                'choices' => TypePropertyEnum::getAvailableTypes(),
                'choice_label' => function ($choice) {
                    return TypePropertyEnum::getTypeName($choice);
                },
            ))
            ->add('description')
            ->add('numPeople')
            ->add('hasGarden')
            ->add('hasGarage')
            ->add('hasTerrace')
            ->add('address', AddressType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Good::class,
        ]);
    }
}
