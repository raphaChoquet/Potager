<?php

namespace Potager\FrontBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityRepository;
use Potager\BusinessBundle\Entity\Fight;
use Potager\BusinessBundle\Entity\User;
use Symfony\Component\HttpFoundation\JsonResponse;

class FightController extends Controller
{


	/**
	* @Route("/fight/", name="fight")
	* @Template()
	*/
	public function fightAction() 
	{
		$attacker = $this->getUser();
		$faction = $attacker->getFaction();
		$level = $attacker->getAttribute()->getLevel();

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

		$defender = $result[0];

		return array('defender' => $defender, 'attacker' => $attacker);
	}
	
	/**
	 * @Route("/fight/go/{id}", name="doFight")
	 * @Template()
	 */
	public function doFightAction(User $defender) 
	{
		$attacker = $this->getUser();

		$fight = new Fight();
		$fight->setAttacker($attacker);
		$fight->setDefender($defender);
				
		if ($fight->getAttackerWin() !== null) {
			return new JsonResponse(array('error' => true));
		}
	
		$fightManager = $this->get('potager_business.fight');
		$resultFight = $fightManager->computeFightResult($attacker, $fight->getDefender());

		$fight->setAttackerWin($resultFight);

		$em = $this->getDoctrine()->getManager();
		$em->persist($fight);

		if ($resultFight === 1 ) {
			$attacker->getFaction()->incrementScore();
		} else if ($resultFight === -1 ) {
			$defender->getFaction()->incrementScore();
		}

		$experienceManager = $this->get('potager_business.experience');
		$experienceManager->fightResult($fight);
		$em->persist($attacker);
		$em->persist($defender);

		$em->flush();
	
		return array('fight' => $fight);

	}

}