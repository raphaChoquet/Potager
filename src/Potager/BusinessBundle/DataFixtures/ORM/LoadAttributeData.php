<?php

namespace Potager\BusinessBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Potager\BusinessBundle\Entity\Attribute;

class LoadAttributeData extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	* {@inheritDoc}
	*/
	public function load(ObjectManager $manager)
	{
		for($i = 0; $i < 8; $i++) {
			$attribute = new Attribute();
			$attribute->setLevel(1);
			$attribute->setXp(0);
			$attribute->setStrenght(5);
			$attribute->setStamina(5);
			$attribute->setAgility(5);
			$attribute->setLuck(5);
			$attribute->setUser($this->getReference('user-'.$i));
			$manager->persist($attribute);
		}

		for($i = 9; $i < 17; $i++) {
			$attribute = new Attribute();
			$attribute->setLevel(7);
			$attribute->setXp(0);
			$strength = 5;
			$stamina = 5;
			$agility = 5;
			for ($j=0; $j < 6; $j++) { 
				$rand = rand(1, 3);
				if($rand === 1) {
					$strength++;
				} else if($rand === 2) {
					$stamina++;
				} else if ($rand === 3) {
					$agility++;
				} 
			}
			$attribute->setStrenght($strength);
			$attribute->setStamina($stamina);
			$attribute->setAgility($agility);
			$attribute->setLuck(5);
			$attribute->setUser($this->getReference('user-'.$i));
			$manager->persist($attribute);
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