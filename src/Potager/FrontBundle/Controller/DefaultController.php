<?php

namespace Potager\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Potager\BusinessBundle\Entity\User;
use Doctrine\ORM\EntityRepository;


use Potager\BusinessBundle\Entity\Attribute;
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
     * @Route("/test")
     * @Template()
     */
    public function combatAction() {
        $user1 = new Attribute();
        $user2 = new Attribute();

        $fight =  $this->get('potager_business.fight');

        $timeForUser1 = $fight->attack($user1, $user2);
        $timeForUser2 = $fight->attack($user1, $user2);

        echo $timeForUser1 . ' :: ' . $timeForUser2;
        die();
    }
}











