<?php

namespace App\Form;

use App\Entity\Absence;
use App\Entity\Team;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbsenceFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('note')
            ->add('date',
                DateTimeType::class,
                [
                    'format' => "yyyy-MM-dd'T'HH:mm:ss",
                    'widget' => 'single_text'
                ]
            )
            ->add('endsAt',
                DateTimeType::class,
                [
                    'format' => "yyyy-MM-dd'T'HH:mm:ss",
                    'widget' => 'single_text'
                ]
            )
            ->add('startsAt',
                DateTimeType::class,
                [
                    'format' => "yyyy-MM-dd'T'HH:mm:ss",
                    'widget' => 'single_text'
                ]
            )
            ->add('reason')
            ->add('team')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Absence::class,
            'csrf_protection' => false
        ]);
    }
}
