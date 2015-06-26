<?php

namespace CDA\CertifBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use CDA\CertifBundle\Entity\PictureCategory;

class LoadPictureCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$pictureCategory1 = new PictureCategory();
		$pictureCategory1->setText('Ebauche');
		$manager->persist($pictureCategory1);
		
		$pictureCategory2 = new PictureCategory();
		$pictureCategory2->setText('QRCode');
		$manager->persist($pictureCategory2);
		
		$pictureCategory3 = new PictureCategory();
		$pictureCategory3->setText('Authentification');
		$manager->persist($pictureCategory3);
		
		$pictureCategory4 = new PictureCategory();
		$pictureCategory4->setText('Final');
		$manager->persist($pictureCategory4);
		
		$manager->flush();
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function getOrder()
	{
		return 1;
	}
	
}
