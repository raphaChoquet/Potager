<?php

namespace Potager\FrontBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Potager\BusinessBundle\Entity\Fight;
use Symfony\Component\HttpFoundation\JsonResponse;

class FightController extends Controller
{


	/**
	* @Route("/fight/", name="fight")
	* @Template()
	*/
	public function fightAction() 
	{
		$user = $this->getUser();
		$faction = $user->getFaction();
		$level = $user->getAttribute()->getLevel();

		$repository = $this->getDoctrine()
			->getRepository('PotagerBusinessBundle:User');

		$diffLevel = 1;

		while ($diffLevel < 100) 
		{
			$query = $repository->getNearbyPlayerQuery($faction, $level, $diffLevel);
			
			$count = $query->select('COUNT(u)')
				->getQuery()
				->getResult();

			if ($count[0][1] != 0) {
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

		$fight = new Fight();
		$fight->setAttacker($user);
		$fight->setDefender($opponent);

		$em = $this->getDoctrine()->getManager();
   	 	$em->persist($fight);
    	$em->flush();

		return array('fight' => $fight, 'user' => $user);
	}
	
	/**
	 * @Route("/fight/go/{id}", name="doFight")
	 * @Template()
	 */
	public function doFightAction(Fight $fight) 
	{
		$user = $this->getUser();
				
		if ($fight->getAttackerWin() !== null) {
			return new JsonResponse(array('error' => true));
		}
	
		$fightManager = $this->get('potager_business.fight');
		$resultFight = $fightManager->computeFightResult($user, $fight->getDefender());
	
		$fight->setAttackerWin($resultFight);
	
		$em = $this->getDoctrine()->getManager();
		$em->persist($fight);
		$em->flush();
	
		return new JsonResponse(array('result' => $resultFight));
	}

}