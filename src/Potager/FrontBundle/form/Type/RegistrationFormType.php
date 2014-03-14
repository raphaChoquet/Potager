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

        $avatars = $options['avatars'];
        $fieldAvatars = array();
        foreach ($avatars as $v) {
            $fieldAvatar[$v] = $v;
        }

        $builder->add('avatar', 'choice', array(
            'choices'  => $avatars,
            'expanded' => true,
            'required' => true
        ));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setRequired(array('avatars'));
    }

    public function getName()
    {
        return 'potager_front_registration';
    }
}