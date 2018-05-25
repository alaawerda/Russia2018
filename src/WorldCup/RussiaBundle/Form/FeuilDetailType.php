<?php
/**
 * Created by PhpStorm.
 * User: Mirak
 * Date: 24/04/2018
 * Time: 19:38
 */

namespace WorldCup\RussiaBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FeuilDetailType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder ->add('Feuil',EntityType::class,array(
            'class'=>'WorldCupRussiaBundle:Feuil',
            'choice_label'=>'Titre' ,
            'multiple'=>false))
            ->add('matche',EntityType::class,array(
                'class'=>'WorldCupRussiaBundle:Matche',
                'choice_label'=>'id' ,
                'multiple'=>false));
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WorldCup\RussiaBundle\Entity\FeuilDetail'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'worldcup_russiabundle_feuildetail';
    }

}