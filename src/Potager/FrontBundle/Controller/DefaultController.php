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
        	->getRepository('PotagerBusinessBundle:faction')
        	->findAll();

        return array('factions'=>$factions);
    }

}