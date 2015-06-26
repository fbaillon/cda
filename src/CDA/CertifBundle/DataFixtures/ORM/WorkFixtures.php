<?php

namespace CDA\CertifBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use CDA\CertifBundle\Entity\Work;

class LoadWorkData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$work1 = new Work();
		$work1->setTitle("Grizzli");
		$work1->setSummary("Grizzli rugissant");
		$work1->setDescription("Grizzli de face, gueule ouverte.");
		$work1->setNumber("1");
		$work1->setLength("650");
		$work1->setHeight("500");
		$work1->setNote("7.5");
		$work1->setIsEnabled(true);
		$work1->setArtist($manager->merge($this->getReference('avalo')));
		$work1->setSlug($work1->getArtist()->getFirstname() . "-" 
									. $work1->getArtist()->getLastname() . "-"
									. $work1->getTitle());
		$manager->persist($work1);
		
		$work2 = new Work();
		$work2->setTitle("Mélanie");
		$work2->setSummary("Portrait de Mélanie.");
		$work2->setDescription("Mélanie sur scène.");
		$work2->setNumber("2");
		$work2->setLength("240");
		$work2->setHeight("253");
		$work2->setIsEnabled(true);
		$work2->setArtist($manager->merge($this->getReference('avalo')));
		$work2->setSlug($work2->getArtist()->getFirstname() . "-" 
									. $work2->getArtist()->getLastname() . "-"
									. $work2->getTitle());
		$manager->persist($work2);
		
		$work3 = new Work();
		$work3->setTitle("Femmes à la lanterne");
		$work3->setSummary("Travail sur une forte source de lumière.");
		$work3->setDescription("Quatres femmes réunies autour d'une source de lumière proche, une lanterne, les éclaire d'une façon très contrastée.");
		$work3->setNumber("3");
		$work3->setLength("240");
		$work3->setHeight("245");
		$work3->setIsEnabled(false);
		$work3->setArtist($manager->merge($this->getReference('avalo')));
		$work3->setSlug($work3->getArtist()->getFirstname() . "-" 
									. $work3->getArtist()->getLastname() . "-"
									. $work3->getTitle());
		$manager->persist($work3);
		
		$work4 = new Work();
		$work4->setTitle("Nue galactique");
		$work4->setSummary("Orgasme galactique d'une femme");
		$work4->setDescription("Orgasme d'une femme dont le ventre est une galaxie.");
		$work4->setNumber("4");
		$work4->setLength("630");
		$work4->setHeight("500");
		$work4->setIsEnabled(true);
		$work4->setArtist($manager->merge($this->getReference('avalo')));
		$work4->setSlug($work4->getArtist()->getFirstname() . "-" 
									. $work4->getArtist()->getLastname() . "-"
									. $work4->getTitle());
		$manager->persist($work4);
		
		$work5 = new Work();
		$work5->setTitle("Laurence");
		$work5->setSummary("Portrait de Laurence");
		$work5->setDescription("Laurence les cheveux en bataille.");
		$work5->setNumber("5");
		$work5->setLength("240");
		$work5->setHeight("320");
		$work5->setIsEnabled(true);
		$work5->setArtist($manager->merge($this->getReference('avalo')));
		$work5->setSlug($work5->getArtist()->getFirstname() . "-" 
									. $work5->getArtist()->getLastname() . "-"
									. $work5->getTitle());
		$manager->persist($work5);
		
		$work6 = new Work();
		$work6->setTitle("Aurélia");
		$work6->setSummary("Portrait d'Aurélia");
		$work6->setDescription("Portrait faisant partie d'un triptype de trois portraits.");
		$work6->setNumber("6");
		$work6->setLength("210");
		$work6->setHeight("250");
		$work6->setIsEnabled(true);
		$work6->setArtist($manager->merge($this->getReference('avalo')));
		$work6->setSlug($work6->getArtist()->getFirstname() . "-" 
									. $work6->getArtist()->getLastname() . "-"
									. $work6->getTitle());
		$today = new \DateTime();
		$work6->setCreatedAt($today->sub(new \DateInterval('P10D')));
		$manager->persist($work6);
		
		$work7 = new Work();
		$work7->setTitle("Thérèse");
		$work7->setSummary("Portrait de Thérèse");
		$work7->setDescription("Portrait faisant partie d'un triptype de trois portraits.");
		$work7->setNumber("7");
		$work7->setLength("210");
		$work7->setHeight("250");
		$work7->setIsEnabled(true);
		$work7->setArtist($manager->merge($this->getReference('avalo')));
		$work7->setSlug($work7->getArtist()->getFirstname() . "-" 
									. $work7->getArtist()->getLastname() . "-"
									. $work7->getTitle());
		$today = new \DateTime();
		$work7->setCreatedAt($today->sub(new \DateInterval('P10D')));
		$manager->persist($work7);
		
		$work8 = new Work();
		$work8->setTitle("Jeanne");
		$work8->setSummary("Portrait de Jeanne");
		$work8->setDescription("Portrait faisant partie d'un triptype de trois portraits.");
		$work8->setNumber("8");
		$work8->setLength("210");
		$work8->setHeight("250");
		$work8->setIsEnabled(true);
		$work8->setArtist($manager->merge($this->getReference('avalo')));
		$work8->setSlug($work8->getArtist()->getFirstname() . "-" 
									. $work8->getArtist()->getLastname() . "-"
									. $work8->getTitle());
		$today = new \DateTime();
		$work8->setCreatedAt($today->sub(new \DateInterval('P10D')));
		$manager->persist($work8);
		
		$work9 = new Work();
		$work9->setTitle("Vague de bord de mer");
		$work9->setSummary("Une vague qui se fracasse sur les rochers.");
		$work9->setDescription("Dessin à la sanguine d'une vague blanche qui se fracasse contre les rochers. Le travail est fait sur un papier lissé avec des aplats de sanguine.");
		$work9->setNumber("9");
		$work9->setLength("650");
		$work9->setHeight("500");
		$work9->setIsEnabled(true);
		$work9->setArtist($manager->merge($this->getReference('avalo')));
		$work9->setSlug($work9->getArtist()->getFirstname() . "-" 
									. $work9->getArtist()->getLastname() . "-"
									. $work9->getTitle());
		$today = new \DateTime();
		$work9->setCreatedAt($today->sub(new \DateInterval('P1M')));
		$manager->persist($work9);
		
		$work10 = new Work();
		$work10->setTitle("Singes de la sagesse");
		$work10->setSummary("Les 3 singes de la sagesse.");
		$work10->setDescription("Dessin à la sanguine des trois singes de la sagesse.");
		$work10->setNumber("10");
		$work10->setLength("210");
		$work10->setHeight("230");
		$work10->setIsEnabled(true);
		$work10->setArtist($manager->merge($this->getReference('avalo')));
		$work10->setSlug($work10->getArtist()->getFirstname() . "-" 
									. $work10->getArtist()->getLastname() . "-"
									. $work10->getTitle());
		$today = new \DateTime();
		$work10->setCreatedAt($today->sub(new \DateInterval('P2M')));
		$manager->persist($work10);
		
		$work11 = new Work();
		$work11->setTitle("The birds");
		$work11->setSummary("Affiche du film 'Les oiseaux'");
		$work11->setDescription("Dessin à la sanguine d'une représentation de l'affiche du film 'Les oiseaux' d'Alfred Hitchcok. Ce dessin fait partie d'un triptyque présentant également 'Orange Mécanique' et 'Reservoir dogs'.");
		$work11->setNumber("11");
		$work11->setLength("210");
		$work11->setHeight("230");
		$work11->setIsEnabled(true);
		$work11->setArtist($manager->merge($this->getReference('avalo')));
		$work11->setSlug($work11->getArtist()->getFirstname() . "-" 
									. $work11->getArtist()->getLastname() . "-"
									. $work11->getTitle());
		$today = new \DateTime();
		$work11->setCreatedAt($today->sub(new \DateInterval('P3M')));
		$manager->persist($work11);
		
		$work12 = new Work();
		$work12->setTitle("Orange mécanique");
		$work12->setSummary("Affiche du film 'Orange mécanique'");
		$work12->setDescription("Dessin à la sanguine d'une représentation de l'affiche du film 'Orange mécanique' de Stanley Kubrick. Ce dessin fait partie d'un triptyque présentant également 'Les oiseaux' et 'Reservoir dogs'.");
		$work12->setNumber("12");
		$work12->setLength("210");
		$work12->setHeight("230");
		$work12->setIsEnabled(true);
		$work12->setArtist($manager->merge($this->getReference('avalo')));
		$work12->setSlug($work12->getArtist()->getFirstname() . "-" 
									. $work12->getArtist()->getLastname() . "-"
									. $work12->getTitle());
		$today = new \DateTime();
		$work12->setCreatedAt($today->sub(new \DateInterval('P3M')));
		$manager->persist($work12);
		
/*
 		$work13 = new Work();
		$work13->setTitle("Reservoir dogs");
		$work13->setSummary("Affiche du film 'Reservoir dogs'");
		$work13->setDescription("Dessin à la pierre noire d'une représentation de l'affiche du film 'Reservoir dogs' de Quentin Tarantino. Ce dessin fait partie d'un triptyque présentant également 'Les oiseaux' et 'Orange mécanique'.");
		$work13->setNumber("13");
		$work13->setLength("210");
		$work13->setHeight("230");
		$work13->setIsEnabled(true);
		$work13->setArtist($manager->merge($this->getReference('avalo')));
		$work13->setSlug($work13->getArtist()->getFirstname() . "-" 
									. $work13->getArtist()->getLastname() . "-"
									. $work13->getTitle());
		$today = new \DateTime();
		$work13->setCreatedAt($today->sub(new \DateInterval('P3M')));
		$manager->persist($work13);
*/
				
 		$work14 = new Work();
		$work14->setTitle("Florence et son fils");
		$work14->setSummary("Florence et son fils");
		$work14->setDescription("Dessin à la mine de plomb, représentant Florence avec son fils dans ses bras.");
		$work14->setNumber("14");
		$work14->setLength("210");
		$work14->setHeight("230");
		$work14->setIsEnabled(true);
		$work14->setArtist($manager->merge($this->getReference('avalo')));
		$work14->setSlug($work14->getArtist()->getFirstname() . "-" 
									. $work14->getArtist()->getLastname() . "-"
									. $work14->getTitle());
		$today = new \DateTime();
		$work14->setCreatedAt($today->sub(new \DateInterval('P4M')));
		$manager->persist($work14);
		
 		$work15 = new Work();
		$work15->setTitle("Femme en cuisine");
		$work15->setSummary("Portrait de profil d'une femme dans une cuisine");
		$work15->setDescription("Dessin à la sanguine, d'une femme de profil penchée sur un évier de cuisine.");
		$work15->setNumber("15");
		$work15->setLength("230");
		$work15->setHeight("210");
		$work15->setIsEnabled(false);
		$work15->setArtist($manager->merge($this->getReference('avalo')));
		$work15->setSlug($work15->getArtist()->getFirstname() . "-" 
									. $work15->getArtist()->getLastname() . "-"
									. $work15->getTitle());
		$manager->persist($work15);
		
 		$work16 = new Work();
		$work16->setTitle("Bord de mer et herbes folles");
		$work16->setSummary("Soleil couchant d'un bord de mer vu à travers les herbes d'une dune.");
		$work16->setDescription("Dessin à la sanguine, d'un soleil couchant sur un bord de mer.");
		$work16->setNumber("16");
		$work16->setLength("600");
		$work16->setHeight("500");
		$work16->setIsEnabled(true);
		$work16->setArtist($manager->merge($this->getReference('avalo')));
		$work16->setSlug($work16->getArtist()->getFirstname() . "-" 
									. $work16->getArtist()->getLastname() . "-"
									. $work16->getTitle());
		$manager->persist($work16);
		
 		$work17 = new Work();
		$work17->setTitle("Carole");
		$work17->setSummary(".");
		$work17->setDescription(".");
		$work17->setNumber("17");
		$work17->setLength("240");
		$work17->setHeight("320");
		$work17->setIsEnabled(true);
		$work17->setArtist($manager->merge($this->getReference('avalo')));
		$work17->setSlug($work17->getArtist()->getFirstname() . "-" 
									. $work17->getArtist()->getLastname() . "-"
									. $work17->getTitle());
		$manager->persist($work17);
		
 		$work18 = new Work();
		$work18->setTitle("Flo nue");
		$work18->setSummary(".");
		$work18->setDescription(".");
		$work18->setNumber("18");
		$work18->setLength("500");
		$work18->setHeight("650");
		$work18->setIsEnabled(true);
		$work18->setArtist($manager->merge($this->getReference('avalo')));
		$work18->setSlug($work18->getArtist()->getFirstname() . "-" 
									. $work18->getArtist()->getLastname() . "-"
									. $work18->getTitle());
		$manager->persist($work18);
		
 		$work19 = new Work();
		$work19->setTitle("Patricia");
		$work19->setSummary(".");
		$work19->setDescription(".");
		$work19->setNumber("19");
		$work19->setLength("240");
		$work19->setHeight("320");
		$work19->setIsEnabled(true);
		$work19->setArtist($manager->merge($this->getReference('avalo')));
		$work19->setSlug($work19->getArtist()->getFirstname() . "-" 
									. $work19->getArtist()->getLastname() . "-"
									. $work19->getTitle());
		$manager->persist($work19);
		
 		$work20 = new Work();
		$work20->setTitle("Happy Ella");
		$work20->setSummary("Happy le chat d'Ella");
		$work20->setDescription(".");
		$work20->setNumber("20");
		$work20->setLength("320");
		$work20->setHeight("240");
		$work20->setIsEnabled(true);
		$work20->setArtist($manager->merge($this->getReference('avalo')));
		$work20->setSlug($work20->getArtist()->getFirstname() . "-" 
									. $work20->getArtist()->getLastname() . "-"
									. $work20->getTitle());
		$manager->persist($work20);
		
		$manager->flush();
		
		$this->addReference('grizzli', $work1);
		$this->addReference('melanie', $work2);
		$this->addReference('femmes_lanterne', $work3);
		$this->addReference('nue', $work4);
		$this->addReference('laurence', $work5);
		$this->addReference('aurelia', $work6);
		$this->addReference('therese', $work7);
		$this->addReference('jeanne', $work8);
		$this->addReference('vague', $work9);
		$this->addReference('singes', $work10);
		$this->addReference('birds', $work11);
		$this->addReference('orange', $work12);
//		$this->addReference('reservoir', $work13);
		$this->addReference('florence', $work14);
		$this->addReference('femme_cuisine', $work15);
		$this->addReference('bord_de_mer_et_herbes_folles', $work16);
		$this->addReference('carole', $work17);
		$this->addReference('flo_nue', $work18);
		$this->addReference('patricia', $work19);
		$this->addReference('happy_ella', $work20);
	}

	/**
	 * {@inheritDoc}
	 */
	public function getOrder()
	{
		return 4;
	}
}
