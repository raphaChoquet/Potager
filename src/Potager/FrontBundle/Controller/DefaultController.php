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


    /**
     * @Route("/init")
     * @Template()
     */
    public function initAction()
    {
        $faction = new Faction();
        $faction->setName('Betterave');
        $faction->setScore(10000);

        $faction2 = new Faction();
        $faction2->setName('Kiwi');
        $faction2->setScore(0);

        $em = $this->getDoctrine()->getManager();
        $em->persist($faction);
        $em->persist($faction2);
        $em->flush();

        echo 'insert Faction';
        exit();
    }


}