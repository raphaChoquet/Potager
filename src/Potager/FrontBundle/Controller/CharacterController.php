<?php

namespace Potager\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Potager\BusinessBundle\Entity\User;
use Doctrine\ORM\EntityRepository;


use Potager\BusinessBundle\Entity\Attribute;
class CharacterController extends Controller
{
	/**
     * @Route("/personnage/")
     * @Template("PotagerFrontBundle:Default:character.html.twig")
     */
    public function characterAction()
	{
	    $user1 = new Attribute();
        $user2 = new Attribute();

        $fight =  $this->get('potager_business.fight');

        $timeForUser1 = $fight->attack($user1, $user2);
        $timeForUser2 = $fight->attack($user1, $user2);

        return array($timeForUser1 . ' :: ' . $timeForUser2);
        
	}
}