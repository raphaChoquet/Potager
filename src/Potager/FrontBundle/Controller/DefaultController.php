<?php

namespace Potager\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Potager\BusinessBundle\Entity\Character;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $factions = $this->getDoctrine()
        	->getRepository('PotagerBusinessBundle:Faction')
        	->findAll();

        $scores = array();
        foreach ($factions as $faction) {
            $scores[$faction->getName()] = $faction->getScore();
        }

        $calc =  $this->get('potager_business.calculate');

        $scores = $calc->toPercent($scores);

        return array('factions'=>$factions, 'scores' => $scores);
    }

    /**
     * @Route("/rejoindre/{factionName}")
     * @Template()
     */
    public function registerAction($factionName)
    {
       $faction = $this->getDoctrine()
            ->getRepository('PotagerBusinessBundle:Faction')
            ->findOneBy(array('name' => $factionName));

        $character = new Character();

        $form = $this->createFormBuilder($character)
            ->add('name', 'text')
            ->add('email', 'email')
            ->add('password', 'password')
            ->add('avatar', 'entity', array(
                'class' => 'PotagerBusinessBundle:Avatar',
                'property' => 'url'

            ))
            ->getForm();

        return array('form' => $form->createView());
    }
}