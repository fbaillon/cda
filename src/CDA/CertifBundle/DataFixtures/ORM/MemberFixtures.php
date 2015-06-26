<?php

namespace CDA\CertifBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use CDA\CertifBundle\Entity\Member;

class LoadMemberData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$member0 = new Member();
		$member0->setFirstname('Marie-Luce');
		$member0->setLastname('BAILLON');
		$member0->setSurname('lulu');
		$manager->persist($member0);
		
		$member1 = new Member();
		$member1->setFirstname('Florence');
		$member1->setLastname('LAMY');
		$member1->setSurname('flo');
		$manager->persist($member1);
		
		$member2 = new Member();
		$member2->setFirstname('Florence');
		$member2->setLastname('ABADIE');
		$member2->setSurname('floflo');
		$manager->persist($member2);
		
		$member3 = new Member();
		$member3->setFirstname('Laureline');
		$member3->setLastname('BAILLON');
		$member3->setSurname('lolo');
		$manager->persist($member3);
		
		$member4 = new Member();
		$member4->setFirstname('Marine');
		$member4->setLastname('BAILLON');
		$member4->setSurname('marin');
		$manager->persist($member4);
		
		$member5 = new Member();
		$member5->setFirstname('Pierre');
		$member5->setLastname('BAILLON');
		$member5->setSurname('pierro');
		$manager->persist($member5);
		
		$member6 = new Member();
		$member6->setFirstname('Julien');
		$member6->setLastname('CHARPENTIER');
		$member6->setSurname('juju');
		$manager->persist($member6);
		
		$member7 = new Member();
		$member7->setFirstname('Cyrille');
		$member7->setLastname('GRANDVAL');
		$member7->setSurname('cyril');
		$manager->persist($member7);
		
		$member8 = new Member();
		$member8->setFirstname('Benoit');
		$member8->setLastname('LAOUCHEZ');
		$member8->setSurname('benoit');
		$manager->persist($member8);
		
		$member9 = new Member();
		$member9->setFirstname('Sérigne');
		$member9->setLastname("M'BAYE");
		$member9->setSurname('mbaye');
		$manager->persist($member9);
		
		$member10 = new Member();
		$member10->setFirstname('Marie-Jo');
		$member10->setLastname("M'BAYE");
		$member10->setSurname('jojo');
		$manager->persist($member10);
		
		$manager->flush();

		$this->addReference('lulu', $member0);
		$this->addReference('flo', $member1);
		$this->addReference('floflo', $member2);
		$this->addReference('lolo', $member3);
		$this->addReference('marin', $member4);
		$this->addReference('pierro', $member5);
		$this->addReference('juju', $member6);
		$this->addReference('cyril', $member7);
		$this->addReference('benoit', $member8);
		$this->addReference('mbaye', $member9);
		$this->addReference('jojo', $member10);
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function getOrder()
	{
		return 3;
	}
	
}
