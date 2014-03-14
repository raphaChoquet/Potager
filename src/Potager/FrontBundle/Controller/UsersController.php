<?php

namespace Potager\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UsersController extends Controller
{
	/**
     * @Template()
     */
	public function usersAction() {
	    $userManager = $this->get('fos_user.user_manager');
	    $this->users = $userManager->findUsers();        
	   // $this->trierUsersAlpha();
	     
	    return array(
	    	'users' => $this->users,
	    );
	}
}