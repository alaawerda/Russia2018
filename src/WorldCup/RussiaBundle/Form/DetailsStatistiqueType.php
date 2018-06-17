<?php

namespace WorldCup\RussiaBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use WorldCup\RussiaBundle\Entity\Joueur;
use Doctrine\ORM\EntityRepository;

class DetailsStatistiqueType extends AbstractType
{

    private $joueur_id;
    public function __construct($joueur_id=null) {
        $this->joueur_id = $joueur_id;
    }
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$joueur_id = $options['joueursb'];
        //$joueur_id  = $this->joueur_id;
        $entity1=$options['data'];
        $entity=$builder->getData();
        $equipea = $entity->getEquipe();
        $joueur_id = $equipea->getId();
        //$id =$entity->getId();
        //dump($ala);
        //$joueur_id = 7;
        $builder->add('temps')->add('type')->add('description')->add('matche')->add('equipe')
            ->add('joueur', EntityType::class, array(
                'class' => Joueur::class,
                'query_builder' => function(EntityRepository $repo) use($joueur_id) {
                    return $repo->createQueryBuilder('u')->where('u.equipe =:id')->setParameter('id', $joueur_id)
                        ;
                },
                'choice_label' => 'nom',
            ));
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
