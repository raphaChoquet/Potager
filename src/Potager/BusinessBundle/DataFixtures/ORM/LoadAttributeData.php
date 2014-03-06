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
		for($i = 0; $i < 10; $i++) {
			$attribute = new Attribute();
			$attribute->setLevel(1);
			$attribute->setHp(100);
			$attribute->setStrenght(5);
			$attribute->setStamina(5);
			$attribute->setAgility(5);
			$attribute->setLuck(1);
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
        return 4;
    }
}