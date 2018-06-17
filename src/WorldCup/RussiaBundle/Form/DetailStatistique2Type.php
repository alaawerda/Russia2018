<?php
/**
 * Created by PhpStorm.
 * User: Alaa Werda
 * Date: 16/06/2018
 * Time: 14:23
 */

namespace WorldCup\RussiaBundle\Form;
use  Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailStatistique2Type extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('temps')->add('type')->add('description')->add('matche')->add('equipe')->add('joueur');
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WorldCup\RussiaBundle\Entity\DetailsStatistique'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'worldcup_russiabundle_detailsstatistique';
    }



}