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
		$name = array('Dolan', 'Obama', 'Bush', 'Hollande', 'Sarkozy', 'Michelangelo', 'Spoderman', 'Donatello', 'Gooby', 'Canarticho', 'Doge', 'Kulbutoke', 'Pruto', 'Leonardo', 'Bogs', 'Raphael', 'OMGWTFBBQ');
		for($i = 0; $i < 17; $i++) {
			$user = new User();
			$user->setUsername($name[$i]);
			$user->setEmail($name[$i] . '@potager.com');
			$user->setPlainPassword('test');
			$user->setEnabled(true);

			if($i%2 !== 1) {
				$user->setAvatar('bundles/potagerbusiness/images/faction/betterave-angry.png');
				$user->setFaction($this->getReference('Betterave'));
			} else {
				$user->setAvatar('bundles/potagerbusiness/images/faction/kiwi-angry.png');
				$user->setFaction($this->getReference('Kiwi'));
			}

			$this->addReference('user-' .$i, $user);
			$manager->persist($user);
		}


		
		$manager->flush();
	}

	/**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
}