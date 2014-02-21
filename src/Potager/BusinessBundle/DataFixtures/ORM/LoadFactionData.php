<?php

namespace Potager\BusinessBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Potager\BusinessBundle\Entity\Faction;

class LoadFactionData extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	* {@inheritDoc}
	*/
	public function load(ObjectManager $manager)
	{
		$faction = new Faction();
		$faction->setName('Betterave');
		
		$manager->persist($faction);
		$manager->flush();

		$this->addReference('Betterave', $faction);

		$faction2 = new Faction();
		$faction2->setName('Kiwi');

		$manager->persist($faction2);
		$manager->flush();

		$this->addReference('Kiwi', $faction2);
	}

	/**
	* {@inheritDoc}
	*/
	public function getOrder()
	{
		return 1;
	}
}