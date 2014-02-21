<?php

namespace Potager\BusinessBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Potager\BusinessBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
	/**
	* {@inheritDoc}
	*/
	public function load(ObjectManager $manager)
	{
		$user = new User();
		$user->setName('User 1');
		$user->setEmail('user@user.com');
		$user->setPassword('1234');
		$user->setAvatar('');
		
		$manager->persist($user);
		$manager->flush();
	}
}