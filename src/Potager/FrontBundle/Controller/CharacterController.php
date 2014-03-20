<?php

namespace Potager\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Potager\BusinessBundle\Entity\Attribute;

class CharacterController extends Controller
{
	/**
     * @Route("/personnage/", name="personnage")
     * @Template()
     */
    public function characterAction()
	{  
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        //Création d'atribut pour un utilisateur créer via l'admin
        if (!$user->getAttribute()) {
            $attribute = new Attribute();
            $attribute->setUser($user);
            $user->setAttribute($attribute);
            $em->persist($attribute);
            $em->flush();
        } 

        return array('user' => $user);
	}

	/**
     * @Template()
     */
	public function statsAction($user) 
	{
		$calc =  $this->get('potager_business.calculate');

		if ($user->getFightDraw() === 0) {
			$stats = $calc->toPercent(array('win' => $user->getFightWon(), 'lost' => $user->getFightLost()));
			$stats['draw'] = 0;
		} else {
			$stats = $calc->toPercent(array('win' => $user->getFightWon(), 'lost' => $user->getFightLost(), 'draw' => $user->getFightDraw()));
		}
		return array('user' => $user, 'stats' => $stats);
	}

	/**
     * @Template()
     */
	public function lastFightsAction($user)
	{
		$fights = $user->getAllFight();
		return array('fights' => $fights->slice(0, 3), 'user' => $user);
	}

	/**
     * @Route("/addSkill/{attribute}", name="addSkill")
     * @Template()
     */
	public function addSkillAction($attribute)
	{
		$user = $this->getUser();

        if($user->getAttribute()->getXp() < 100) {
            return new JsonResponse(array('level' => $user->getAttribute()->getLevel(), 'attribute' => $user->getAttribute()->{'get'.ucfirst($attribute)}()));
        }

		$newLevel = $user->getAttribute()->getLevel() + 1;
		$user->getAttribute()->setLevel($newLevel);

		$newExperience = $user->getAttribute()->getXp();
		$user->getAttribute()->setXp(0);

		$newAttribute = $user->getAttribute()->{'get'.ucfirst($attribute)}();
		$user->getAttribute()->{'set'.ucfirst($attribute)}($newAttribute+1);

		$em = $this->getDoctrine()->getManager();
		$em->persist($user->getAttribute());
		$em->flush();

		return new JsonResponse(array('level' => $newLevel, 'attribute' => $newAttribute));
	}
}