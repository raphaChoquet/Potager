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
     * @Route("/rejoindre/{factionName}")
     * @Template()
     */
    public function registerAction($factionName, Request $request)
    {
       $faction = $this->getDoctrine()
            ->getRepository('PotagerBusinessBundle:Faction')
            ->findOneBy(array('name' => $factionName));

        $user = new User();

        $form = $this->createFormBuilder($user)
            ->add('username', 'text')
            ->add('email', 'email')
            ->add('password', 'password')
            ->add('avatar', 'entity', array(
                'class' => 'PotagerBusinessBundle:Avatar',
                'property' => 'url',
                'expanded' => true,
                'query_builder' => function(EntityRepository $er) use ($faction) {

                    return $er->createQueryBuilder('u')
                        ->where('u.faction = :faction')
                        ->setParameter('faction', $faction);
                }
            ))
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            return $this->redirect($this->generateUrl('task_success'));
        }

        return array('form' => $form->createView());
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











