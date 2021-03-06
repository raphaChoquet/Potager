<?php
//src/Potager/BackBundle/Admin/UserAdmin.php

namespace Potager\BackBundle\Admin;

use Sonata\UserBundle\Admin\Model\UserAdmin as BaseUserAdmin;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use FOS\UserBundle\Model\UserManagerInterface;
use Sonata\AdminBundle\Route\RouteCollection;


class UserAdmin extends BaseUserAdmin
{   

    public $avatarManager;

    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->with('General')
                ->add('username')
                ->add('email')
            ->end()
            // .. more info
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                ->add('username')
                ->add('email')
                ->add('plainPassword', 'text', array('required' => false))
            ->end()
            // .. more info
            ;

        $avatars = $this->getAvatarManager()->getAvatar();
        $fieldAvatars = array();
        foreach ($avatars as $v) {
            $fieldAvatar[$v] = $v;
        }
        if (!$this->getSubject()->hasRole('ROLE_SUPER_ADMIN')) {
            $formMapper
                ->with('Management')
                    ->add('roles', 'sonata_security_roles', array(
                        'expanded' => true,
                        'multiple' => true,
                        'required' => false
                    ))
                    ->add('locked', null, array('required' => false))
                    ->add('expired', null, array('required' => false))
                    ->add('enabled', null, array('required' => false))
                    ->add('credentialsExpired', null, array('required' => false))
                    ->add('faction', 'entity', array(
                        'required' => false, 
                        'label' => 'Faction',
                        'class' => 'PotagerBusinessBundle:Faction',
                        'property' => 'name',
                        'expanded' => true
                    ))
                   ->add('avatar', 'choice', array(
                        'label' => 'Avatar',
                        'choices'  => $fieldAvatar,
                        'expanded' => true,
                        'required' => true
                    ));
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        $filterMapper
            ->add('id')
            ->add('username')
            ->add('locked')
            ->add('email')
            ->add('faction.name', 'doctrine_orm_choice', array('label' => 'faction'), 'choice',  array(
                     'choices' => array('Betterave' => 'Betterave', 'Kiwi' => 'Kiwi'),
                     'expanded' => false,
                     'multiple' => false
                ))
        ;
    }
    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('username')
            ->add('email')
            ->add('enabled', null, array('editable' => true))
            ->add('locked', null, array('editable' => true))
            ->add('createdAt')
            ->add('faction', null, array(
                'associated_tostring' => 'getName',
                'label' => 'Faction')
            )
        ;

        if ($this->isGranted('ROLE_ALLOWED_TO_SWITCH')) {
            $listMapper
                ->add('impersonating', 'string', array('template' => 'SonataUserBundle:Admin:Field/impersonating.html.twig'))
            ;
        }
    }

/*        public function getEditTemplate()
    {
        return 'BackBundle:CRUD:base_standard_edit_field.html.twig';
    }
*/


    /**
     */
    public function setAvatarManager($avatarManager)
    {
        $this->avatarManager = $avatarManager;
    }

    /**
     */
    public function getAvatarManager()
    {
        return $this->avatarManager;
    }
}
