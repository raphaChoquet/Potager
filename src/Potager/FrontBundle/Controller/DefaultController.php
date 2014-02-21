<?php

namespace Potager\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Potager\BusinessBundle\Entity\Faction;

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

        $images = $this->getDoctrine()
            ->getRepository('PotagerBusinessBundle:Avatar')
            ->findBy(array('faction' => $faction));

        return array('faction' => $faction, 'images' => $images);
    }
}