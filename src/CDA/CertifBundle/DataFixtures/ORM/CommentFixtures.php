<?php

namespace CDA\CertifBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use CDA\CertifBundle\Entity\comment;

class LoadCommentData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$c_gr_1 = new Comment();
		$c_gr_1->setDescription("C'est magnifique, mon chéri !");
		$c_gr_1->setWork($manager->merge($this->getReference('grizzli')));
		$c_gr_1->setMember($manager->merge($this->getReference('lulu')));
		$manager->persist($c_gr_1);
		
		$c_gr_2 = new Comment();
		$c_gr_2->setDescription("Le travail est impressionnant, bravo. Je suis frappée par l'expression de vie de l'animal.");
		$c_gr_2->setWork($manager->merge($this->getReference('grizzli')));
		$c_gr_2->setMember($manager->merge($this->getReference('flo')));
		$manager->persist($c_gr_2);
		
		$c_gr_3 = new Comment();
		$c_gr_3->setDescription("Waouuu, c'est génial !");
		$c_gr_3->setWork($manager->merge($this->getReference('grizzli')));
		$c_gr_3->setMember($manager->merge($this->getReference('floflo')));
		$manager->persist($c_gr_3);
		
		$c_gr_4 = new Comment();
		$c_gr_4->setDescription("Mon papou toujours aussi fort ...");
		$c_gr_4->setWork($manager->merge($this->getReference('grizzli')));
		$c_gr_4->setMember($manager->merge($this->getReference('lolo')));
		$manager->persist($c_gr_4);
		
		$c_gr_5 = new Comment();
		$c_gr_5->setDescription("J'aime bien voir comment la façon dont il a été construit.");
		$c_gr_5->setWork($manager->merge($this->getReference('grizzli')));
		$c_gr_5->setMember($manager->merge($this->getReference('marin')));
		$manager->persist($c_gr_5);
		
		$c_gr_6 = new Comment();
		$c_gr_6->setDescription("Trop de la balle, ziva le cum !");
		$c_gr_6->setWork($manager->merge($this->getReference('grizzli')));
		$c_gr_6->setMember($manager->merge($this->getReference('pierro')));
		$manager->persist($c_gr_6);
		
		$c_gr_7 = new Comment();
		$c_gr_7->setDescription("C'est pas mal.");
		$c_gr_7->setWork($manager->merge($this->getReference('grizzli')));
		$c_gr_7->setMember($manager->merge($this->getReference('juju')));
		$manager->persist($c_gr_7);
		
		$manager->flush();
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function getOrder()
	{
		return 6;
	}
	
}
