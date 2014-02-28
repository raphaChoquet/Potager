<?php

namespace Potager\FrontBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Doctrine\ORM\EntityRepository;

class RegistrationFormType extends BaseType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $faction = $options['faction'];

        $builder->add('avatar', 'entity', array(
                    'class' => 'PotagerBusinessBundle:Avatar',
                    'property' => 'url',
                    'expanded' => true,
                    'query_builder' => function(EntityRepository $er) use ($faction) {

                        return $er->createQueryBuilder('u')
                            ->where('u.faction = :faction')
                            ->setParameter('faction', $faction);
                    }
                ));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setRequired(array('faction'));
    }

    public function getName()
    {
        return 'potager_front_registration';
    }
}