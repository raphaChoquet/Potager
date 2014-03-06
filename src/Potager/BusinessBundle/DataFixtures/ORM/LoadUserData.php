<?php

namespace Potager\BusinessBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Potager\BusinessBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	* {@inheritDoc}
	*/
	public function load(ObjectManager $manager)
	{
		for($i = 0; $i < 10; $i++) {
			$user = new User();
			$user->setUsername('user' . $i);
			$user->setEmail('user-' . $i . '@user.com');
			$user->setPlainPassword('test');
			$user->setEnabled(true);

			if($i%2 === 1) {
				$user->setAvatar($this->getReference('avatarBetterave'));
				$user->setFaction($this->getReference('Betterave'));
			} else {
				$user->setAvatar($this->getReference('avatarKiwi'));
				$user->setFaction($this->getReference('Kiwi'));
			}

			$this->addReference('user-'.$i, $user);
			$manager->persist($user);

		}
		
		$manager->flush();
	}

	/**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
}