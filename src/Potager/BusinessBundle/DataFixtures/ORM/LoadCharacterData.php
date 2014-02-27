<?php

namespace Potager\BusinessBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Potager\BusinessBundle\Entity\Character;

class LoadCharacterData extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	* {@inheritDoc}
	*/
	public function load(ObjectManager $manager)
	{
		for($i = 0; $i < 10; $i++) {
			$character = new Character();
			$character->setName('character ' . $i);
			$character->setEmail('character-' . $i . '@character.com');
			$character->setPassword('1234');
			$character->setAvatar('');

			if($i%2 === 1) {
				$character->setFaction($this->getReference('Betterave'));
			} else {
				$character->setFaction($this->getReference('Kiwi'));
			}

			$this->addReference('character-'.$i, $character);
			$manager->persist($character);

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