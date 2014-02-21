<?php

namespace Potager\BusinessBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Potager\BusinessBundle\Entity\User;

class LoadFactionData implements FixtureInterface
{
	/**
	* {@inheritDoc}
	*/
	public function load(ObjectManager $manager)
	{
		$faction = new Faction();
		$faction->setName('User 1');
		$faction->setEmail('user@user.com');
		$faction->setPassword('1234');
		$faction->setAvatar('');
		
		$manager->persist($user);
		$manager->flush();
	}
}