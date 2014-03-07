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
     * @Route("/personnage/", name="personnage")
     * @Template()
     */
    public function characterAction()
	{
        $user = $this->getUser();
        return array('user' => $user);
	}
}