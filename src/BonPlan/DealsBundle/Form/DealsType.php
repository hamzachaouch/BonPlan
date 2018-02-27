<?php

namespace BonPlan\DealsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Translation\Tests\StringClass;

class DealsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name')
            ->add('description')
            ->add('price')
            ->add('datedebut',DateType::class)
            ->add('datefin',DateType::class)
            ->add('address')
            ->add('categorie', ChoiceType::class, array(
                'choices'  => array(
                    'Restaurant' => 'restaurant',
                    'Salon de Thé' => 'salon de thé',
                    'Hotels' => 'Hotels',
                )))
            ->add('imgUrl',FileType::class,array('data_class'=>null, 'empty_data'
            => "http://www.livraisonsgourmandes.com/104-large_default/pack-petit-dejeuner.jpg" ))
            ->add('programme')
            ->add('telephone')
            ->add('horraire')
            ->add('nbrclients',HiddenType::class)
            ->add('note',HiddenType::class)
            ->add('idCompany',HiddenType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BonPlan\DealsBundle\Entity\Deals'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'bonplan_dealsbundle_deals';
    }


}
