<?php

namespace WorldCup\RussiaBundle\Form;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MatcheType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date' , DateTimeType::class, array('date_format' => 'yyyy-MM-dd  HH:ii') )->add('etat')->add('phase')->add('groupe')->add('stade')->add('equipeA')->add('equipeB')->add('staffe_arbitre');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WorldCup\RussiaBundle\Entity\Matche'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'worldcup_russiabundle_matche';
    }


}
