<?php

namespace Potager\BusinessBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Potager\BusinessBundle\Entity\Fight;

class LoadFightData extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	* {@inheritDoc}
	*/
	public function load(ObjectManager $manager)
	{
		for($i = 8; $i < 17; $i++) {
			if($i === 16) {
				$defender = $this->getReference('user-5');
			} else {
				$defender = $this->getReference('user-' . ($i + 1));
			}

			$fight = new Fight();
			$fight->setAttacker($this->getReference('user-'.$i));
			$fight->setDefender($defender);

			$fight->setAttackerWin(rand(-1, 1));

			$manager->persist($fight);

		}
		
		$manager->flush();
	}

	/**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4;
    }
}