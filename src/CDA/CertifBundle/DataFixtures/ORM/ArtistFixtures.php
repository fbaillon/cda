<?php

namespace CDA\CertifBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use CDA\CertifBundle\Entity\Artist;

class LoadArtistData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$artist1 = new Artist();
		$artist1->setFirstname('Frédéric');
		$artist1->setLastname('BAILLON');
		$artist1->setSurname('avalo');
		$manager->persist($artist1);
		
		$artist2 = new Artist();
		$artist2->setFirstname('Isabel');
		$artist2->setLastname('LAMY');
		$artist2->setSurname('isa');
		$manager->persist($artist2);
		
		$manager->flush();

		$this->addReference('avalo', $artist1);
		$this->addReference('isa', $artist2);
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function getOrder()
	{
		return 2;
	}
	
}
