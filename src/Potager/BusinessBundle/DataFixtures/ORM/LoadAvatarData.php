<?php

namespace Potager\BusinessBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Potager\BusinessBundle\Entity\Avatar;

class LoadAvatarData extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	* {@inheritDoc}
	*/
	public function load(ObjectManager $manager)
	{
		$avatar = new Avatar();
		$avatar->setUrl('bundles/potagerbusiness/images/betterave-angry.png');
		$avatar->setFaction($this->getReference('Betterave'));
				
		$manager->persist($avatar);

		$avatar = new Avatar();
		$avatar->setUrl('bundles/potagerbusiness/images/betterave-crazy.png');
		$avatar->setFaction($this->getReference('Betterave'));

		$manager->persist($avatar);

		$avatar = new Avatar();
		$avatar->setUrl('bundles/potagerbusiness/images/betterave-fly.png');
		$avatar->setFaction($this->getReference('Betterave'));

		$manager->persist($avatar);		

		$avatar = new Avatar();
		$avatar->setUrl('bundles/potagerbusiness/images/betterave-happy.png');
		$avatar->setFaction($this->getReference('Betterave'));

		$manager->persist($avatar);		

		$avatar = new Avatar();
		$avatar->setUrl('bundles/potagerbusiness/images/betterave-run.png');
		$avatar->setFaction($this->getReference('Betterave'));

		$manager->persist($avatar);		

		$avatar = new Avatar();
		$avatar->setUrl('bundles/potagerbusiness/images/kiwi-angry.png');
		$avatar->setFaction($this->getReference('Kiwi'));

		$manager->persist($avatar);		

		$avatar = new Avatar();
		$avatar->setUrl('bundles/potagerbusiness/images/kiwi-drunk.png');
		$avatar->setFaction($this->getReference('Kiwi'));

		$manager->persist($avatar);

		$avatar = new Avatar();
		$avatar->setUrl('bundles/potagerbusiness/images/kiwi-happy.png');
		$avatar->setFaction($this->getReference('Kiwi'));

		$manager->persist($avatar);

		$avatar = new Avatar();
		$avatar->setUrl('bundles/potagerbusiness/images/kiwi-teeth.png');
		$avatar->setFaction($this->getReference('Kiwi'));

		$manager->persist($avatar);		

		$avatar = new Avatar();
		$avatar->setUrl('bundles/potagerbusiness/images/kiwi-tongue.png');
		$avatar->setFaction($this->getReference('Kiwi'));

		$manager->persist($avatar);		
	
		$manager->flush();

	}

	/**
	* {@inheritDoc}
	*/
	public function getOrder()
	{
		return 5;
	}
}