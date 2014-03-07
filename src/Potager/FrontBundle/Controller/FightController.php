<?php

namespace Potager\FrontBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Potager\BusinessBundle\Entity\fight;

class FightController extends Controller
{


	/**
	* @Route("/fight/")
	* @Template()
	*/
	public function fightAction() {

		$user = $this->getUser();
		$faction = $user->getFaction();
		$level = $user->getAttribute()->getLevel();


		$repository = $this->getDoctrine()
			->getRepository('PotagerBusinessBundle:User');


		$diffLevel = 1;
		while($diffLevel < 100) 
		{
			$query = $repository->createQueryBuilder('u')
				->join('u.attribute', 'a')
				->where('u.faction != :faction')
				->andWhere('a.level >= :level1')
				->andWhere('a.level <= :level2')
				->setParameter('faction', $faction)
				->setParameter('level1', $level - $diffLevel )
				->setParameter('level2', $level + $diffLevel );

			$count = $query->select('COUNT(u)')
				->getQuery()
				->getResult();

			if($count[0][1] != 0) {
				break;
			}

			$diffLevel++;
		}

		$result = $query->select('u')
			->setMaxResults(1)
			->setFirstResult(round(rand(0, $count[0][1]-1)))
			->getQuery()
			->getResult();


		$opponent = $result[0];

		$fight =  $this->get('potager_business.fight');

        $timeForUser1 = $fight->attack($user->getAttribute(), $opponent->getAttribute());
        $timeForUser2 = $fight->attack($opponent->getAttribute(), $user->getAttribute());

        if ($timeForUser1 < $timeForUser2) {
			$resultFight = 1;       
        } elseif ($timeForUser1 == $timeForUser2) {
        	$resultFight = 0;  
        } else {
        	$resultFight = -1;  
		}

		$fight = new Fight();
		$fight->setAttacker($user);
		$fight->setDefender($opponent);
		$fight->setAttackerWin($resultFight);

		$em = $this->getDoctrine()->getManager();
   	 	$em->persist($fight);
    	$em->flush();

		return array('fight' => $fight, 'faction' => $faction);


	}

}