<?php

namespace CDA\CertifBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use CDA\CertifBundle\Entity\Picture;

class LoadPictureData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $manager)
	{
// Grizzli
		$pic_gr_1 = new Picture();
		$pic_gr_1->setWork($manager->merge($this->getReference('grizzli')));
		$pic_gr_1->setPath('/uploads/pictures/grizzli_1.jpg');
		$pic_gr_1->setComment('Premier travail');
		$pic_gr_1->setIsEnabled(true);
		$pic_gr_1->setMainView(false);
		$pic_gr_1->setPictureCategory('Ebauche');
		$today = new \DateTime();
		$pic_gr_1->setCreatedAt($today->sub(new \DateInterval('P2D')));
		$manager->persist($pic_gr_1);
		
		$pic_gr_2 = new Picture();
		$pic_gr_2->setWork($manager->merge($this->getReference('grizzli')));
		$pic_gr_2->setPath('/uploads/pictures/grizzli_2.jpg');
		$pic_gr_2->setComment('Second travail');
		$pic_gr_2->setIsEnabled(true);
		$pic_gr_2->setMainView(false);
		$pic_gr_2->setPictureCategory('Ebauche');
		$today = new \DateTime();
		$pic_gr_2->setCreatedAt($today->sub(new \DateInterval('P1D')));
		$manager->persist($pic_gr_2);
		
		$pic_gr_3 = new Picture();
		$pic_gr_3->setWork($manager->merge($this->getReference('grizzli')));
		$pic_gr_3->setPath('/uploads/pictures/grizzli_3.jpg');
		$pic_gr_3->setComment('Travail final');
		$pic_gr_3->setIsEnabled(true);
		$pic_gr_3->setMainView(true);
		$pic_gr_3->setPictureCategory('Final');
		$manager->persist($pic_gr_3);
		
		$pic_gr_4 = new Picture();
		$pic_gr_4->setWork($manager->merge($this->getReference('grizzli')));
		$pic_gr_4->setPath('/uploads/pictures/grizzli-ca.jpg');
		$pic_gr_4->setComment("Copie du certificat d'authenticité");
		$pic_gr_4->setIsEnabled(true);
		$pic_gr_4->setMainView(false);
		$pic_gr_4->setPictureCategory('Authentification');
		$manager->persist($pic_gr_4);
		
		$pic_gr_5 = new Picture();
		$pic_gr_5->setWork($manager->merge($this->getReference('grizzli')));
		$pic_gr_5->setPath('/uploads/pictures/grizzli-qr.png');
		$pic_gr_5->setComment("QR code");
		$pic_gr_5->setIsEnabled(true);
		$pic_gr_5->setMainView(false);
		$pic_gr_5->setPictureCategory('Authentification');
		$manager->persist($pic_gr_5);
		
// Femmes à la lanterne
		$pic_fe_1 = new Picture();
		$pic_fe_1->setWork($manager->merge($this->getReference('femmes_lanterne')));
		$pic_fe_1->setPath('/uploads/pictures/femmes_a_la_lanterne.jpg');
		$pic_fe_1->setComment('Travail final');
		$pic_fe_1->setIsEnabled(true);
		$pic_fe_1->setMainView(true);
		$pic_fe_1->setPictureCategory('Final');
		$manager->persist($pic_fe_1);
		
		$pic_fe_2 = new Picture();
		$pic_fe_2->setWork($manager->merge($this->getReference('femmes_lanterne')));
		$pic_fe_2->setPath('/uploads/pictures/femmes_a_la_lanterne-ca.png');
		$pic_fe_2->setComment("Copie du certificat d'authenticité");
		$pic_fe_2->setIsEnabled(true);
		$pic_fe_2->setMainView(false);
		$pic_fe_2->setPictureCategory('Authentification');
		$manager->persist($pic_fe_2);
		
		$pic_fe_3 = new Picture();
		$pic_fe_3->setWork($manager->merge($this->getReference('femmes_lanterne')));
		$pic_fe_3->setPath('/uploads/pictures/femmes_a_la_lanterne-qr.png');
		$pic_fe_3->setComment("QR Code");
		$pic_fe_3->setIsEnabled(true);
		$pic_fe_3->setMainView(false);
		$pic_fe_3->setPictureCategory('Authentification');
		$manager->persist($pic_fe_3);
		
// Mélanie
		$pic_me_1 = new Picture();
		$pic_me_1->setWork($manager->merge($this->getReference('melanie')));
		$pic_me_1->setPath('/uploads/pictures/melanie.jpg');
		$pic_me_1->setComment('Travail final');
		$pic_me_1->setIsEnabled(true);
		$pic_me_1->setMainView(true);
		$pic_me_1->setPictureCategory('Final');
		$manager->persist($pic_me_1);
		
		$pic_me_2 = new Picture();
		$pic_me_2->setWork($manager->merge($this->getReference('melanie')));
		$pic_me_2->setPath('/uploads/pictures/melanie-ca.png');
		$pic_me_2->setComment("Copie du certificat d'authenticité");
		$pic_me_2->setIsEnabled(true);
		$pic_me_2->setMainView(false);
		$pic_me_2->setPictureCategory('Authentification');
		$manager->persist($pic_me_2);
		
		$pic_me_3 = new Picture();
		$pic_me_3->setWork($manager->merge($this->getReference('melanie')));
		$pic_me_3->setPath('/uploads/pictures/melanie-qr.png');
		$pic_me_3->setComment("QR Code");
		$pic_me_3->setIsEnabled(true);
		$pic_me_3->setMainView(false);
		$pic_me_3->setPictureCategory('Authentification');
		$manager->persist($pic_me_3);
		
// Nue galactique
		$pic_nu_1 = new Picture();
		$pic_nu_1->setWork($manager->merge($this->getReference('nue')));
		$pic_nu_1->setPath('/uploads/pictures/nue_galactique_1.jpg');
		$pic_nu_1->setComment('Premier travail');
		$pic_nu_1->setIsEnabled(false);
		$pic_nu_1->setMainView(false);
		$pic_nu_1->setPictureCategory('Ebauche');
		$today = new \DateTime();
		$pic_nu_1->setCreatedAt($today->sub(new \DateInterval('P2D')));
		$manager->persist($pic_nu_1);
		
		$pic_nu_2 = new Picture();
		$pic_nu_2->setWork($manager->merge($this->getReference('nue')));
		$pic_nu_2->setPath('/uploads/pictures/nue_galactique_2.jpg');
		$pic_nu_2->setComment('Deuxième travail');
		$pic_nu_2->setIsEnabled(true);
		$pic_nu_2->setMainView(false);
		$pic_nu_2->setPictureCategory('Ebauche');
		$manager->persist($pic_nu_2);
		
// Laurence
		$pic_la_1 = new Picture();
		$pic_la_1->setWork($manager->merge($this->getReference('laurence')));
		$pic_la_1->setPath('/uploads/pictures/laurence_1.jpg');
		$pic_la_1->setComment('Construction');
		$pic_la_1->setIsEnabled(true);
		$pic_la_1->setMainView(false);
		$pic_la_1->setPictureCategory('Ebauche');
		$today = new \DateTime();
		$pic_la_1->setCreatedAt($today->sub(new \DateInterval('P3D')));
		$manager->persist($pic_la_1);
		
		$pic_la_2 = new Picture();
		$pic_la_2->setWork($manager->merge($this->getReference('laurence')));
		$pic_la_2->setPath('/uploads/pictures/laurence_2.jpg');
		$pic_la_2->setComment('Premier travail');
		$pic_la_2->setIsEnabled(true);
		$pic_la_2->setMainView(false);
		$pic_la_2->setPictureCategory('Ebauche');
		$today = new \DateTime();
		$pic_la_2->setCreatedAt($today->sub(new \DateInterval('P4D')));
		$manager->persist($pic_la_2);
		
		$pic_la_3 = new Picture();
		$pic_la_3->setWork($manager->merge($this->getReference('laurence')));
		$pic_la_3->setPath('/uploads/pictures/laurence_3.jpg');
		$pic_la_3->setComment('Second travail');
		$pic_la_3->setIsEnabled(true);
		$pic_la_3->setMainView(false);
		$pic_la_3->setPictureCategory('Ebauche');
		$today = new \DateTime();
		$pic_la_3->setCreatedAt($today->sub(new \DateInterval('P3D')));
		$manager->persist($pic_la_3);
		
		$pic_la_4 = new Picture();
		$pic_la_4->setWork($manager->merge($this->getReference('laurence')));
		$pic_la_4->setPath('/uploads/pictures/laurence_4.jpg');
		$pic_la_4->setComment('Troisième travail');
		$pic_la_4->setIsEnabled(true);
		$pic_la_4->setMainView(false);
		$pic_la_4->setPictureCategory('Ebauche');
		$today = new \DateTime();
		$pic_la_4->setCreatedAt($today->sub(new \DateInterval('P1D')));
		$manager->persist($pic_la_4);
		
		$pic_la_5 = new Picture();
		$pic_la_5->setWork($manager->merge($this->getReference('laurence')));
		$pic_la_5->setPath('/uploads/pictures/laurence_5.jpg');
		$pic_la_5->setComment('Travail final');
		$pic_la_5->setIsEnabled(true);
		$pic_la_5->setMainView(true);
		$pic_la_5->setPictureCategory('Final');
		$manager->persist($pic_la_5);
		
		$pic_la_6 = new Picture();
		$pic_la_6->setWork($manager->merge($this->getReference('laurence')));
		$pic_la_6->setPath('/uploads/pictures/laurence-ca.jpg');
		$pic_la_6->setComment("Copie du certificat d'authenticité");
		$pic_la_6->setIsEnabled(true);
		$pic_la_6->setMainView(false);
		$pic_la_6->setPictureCategory('Authentification');
		$manager->persist($pic_la_6);
		
		$pic_la_7 = new Picture();
		$pic_la_7->setWork($manager->merge($this->getReference('laurence')));
		$pic_la_7->setPath('/uploads/pictures/laurence-qr.png');
		$pic_la_7->setComment("QR Code");
		$pic_la_7->setIsEnabled(true);
		$pic_la_7->setMainView(false);
		$pic_la_7->setPictureCategory('Authentification');
		$manager->persist($pic_la_7);
		
// Aurélia
		$pic_au_1 = new Picture();
		$pic_au_1->setWork($manager->merge($this->getReference('aurelia')));
		$pic_au_1->setPath('/uploads/pictures/aurelia.jpg');
		$pic_au_1->setComment('Travail final');
		$pic_au_1->setIsEnabled(true);
		$pic_au_1->setMainView(true);
		$pic_au_1->setPictureCategory('Final');
		$today = new \DateTime();
		$pic_au_1->setCreatedAt($today->sub(new \DateInterval('P10D')));
		$manager->persist($pic_au_1);
		
// Thérèse
		$pic_th_1 = new Picture();
		$pic_th_1->setWork($manager->merge($this->getReference('therese')));
		$pic_th_1->setPath('/uploads/pictures/therese.jpg');
		$pic_th_1->setComment('Travail final');
		$pic_th_1->setIsEnabled(true);
		$pic_th_1->setMainView(true);
		$pic_th_1->setPictureCategory('Final');
		$today = new \DateTime();
		$pic_th_1->setCreatedAt($today->sub(new \DateInterval('P10D')));
		$manager->persist($pic_th_1);
		
// Jeanne
		$pic_je_1 = new Picture();
		$pic_je_1->setWork($manager->merge($this->getReference('jeanne')));
		$pic_je_1->setPath('/uploads/pictures/jeanne.jpg');
		$pic_je_1->setComment('Travail final');
		$pic_je_1->setIsEnabled(true);
		$pic_je_1->setMainView(true);
		$pic_je_1->setPictureCategory('Final');
		$today = new \DateTime();
		$pic_je_1->setCreatedAt($today->sub(new \DateInterval('P10D')));
		$manager->persist($pic_je_1);
		
// Bord de mer
		$pic_bm_1 = new Picture();
		$pic_bm_1->setWork($manager->merge($this->getReference('vague')));
		$pic_bm_1->setPath('/uploads/pictures/bord_de_mer.jpg');
		$pic_bm_1->setComment('Travail final');
		$pic_bm_1->setIsEnabled(true);
		$pic_bm_1->setMainView(true);
		$pic_bm_1->setPictureCategory('Final');
		$today = new \DateTime();
		$pic_bm_1->setCreatedAt($today->sub(new \DateInterval('P1M')));
		$manager->persist($pic_bm_1);
		
// Singes
		$pic_si_1 = new Picture();
		$pic_si_1->setWork($manager->merge($this->getReference('singes')));
		$pic_si_1->setPath('/uploads/pictures/singes.jpg');
		$pic_si_1->setComment('Travail final');
		$pic_si_1->setIsEnabled(true);
		$pic_si_1->setMainView(true);
		$pic_si_1->setPictureCategory('Final');
		$today = new \DateTime();
		$pic_si_1->setCreatedAt($today->sub(new \DateInterval('P2M')));
		$manager->persist($pic_si_1);
		
// The Birds
		$pic_tb_1 = new Picture();
		$pic_tb_1->setWork($manager->merge($this->getReference('birds')));
		$pic_tb_1->setPath('/uploads/pictures/the_birds.jpg');
		$pic_tb_1->setComment('Travail final');
		$pic_tb_1->setIsEnabled(true);
		$pic_tb_1->setMainView(true);
		$pic_tb_1->setPictureCategory('Final');
		$today = new \DateTime();
		$pic_tb_1->setCreatedAt($today->sub(new \DateInterval('P3M')));
		$manager->persist($pic_tb_1);
		
// Orange mécanique
		$pic_om_1 = new Picture();
		$pic_om_1->setWork($manager->merge($this->getReference('orange')));
		$pic_om_1->setPath('/uploads/pictures/orange_mecanique.jpg');
		$pic_om_1->setComment('Travail final');
		$pic_om_1->setIsEnabled(true);
		$pic_om_1->setMainView(true);
		$pic_om_1->setPictureCategory('Final');
		$today = new \DateTime();
		$pic_om_1->setCreatedAt($today->sub(new \DateInterval('P3M')));
		$manager->persist($pic_om_1);
		
// Florence et son fils
		$pic_ff_1 = new Picture();
		$pic_ff_1->setWork($manager->merge($this->getReference('florence')));
		$pic_ff_1->setPath('/uploads/pictures/florence_fils.jpg');
		$pic_ff_1->setComment('Travail final');
		$pic_ff_1->setIsEnabled(true);
		$pic_ff_1->setMainView(true);
		$pic_ff_1->setPictureCategory('Final');
		$today = new \DateTime();
		$pic_ff_1->setCreatedAt($today->sub(new \DateInterval('P4M')));
		$manager->persist($pic_ff_1);
		
// Femme en cuisine
		$pic_fc_1 = new Picture();
		$pic_fc_1->setWork($manager->merge($this->getReference('femme_cuisine')));
		$pic_fc_1->setPath('/uploads/pictures/femme_en_cuisine_1.jpg');
		$pic_fc_1->setComment('Construction');
		$pic_fc_1->setIsEnabled(true);
		$pic_fc_1->setMainView(false);
		$pic_fc_1->setPictureCategory('Ebauche');
		$pic_fc_1->setCreatedAt(new \DateTime('2013-02-01'));
		$manager->persist($pic_fc_1);
		
		$pic_fc_2 = new Picture();
		$pic_fc_2->setWork($manager->merge($this->getReference('femme_cuisine')));
		$pic_fc_2->setPath('/uploads/pictures/femme_en_cuisine_2.jpg');
		$pic_fc_2->setComment("Deuxième travail");
		$pic_fc_2->setIsEnabled(true);
		$pic_fc_2->setMainView(false);
		$pic_fc_2->setPictureCategory('Ebauche');
		$pic_fc_2->setCreatedAt(new \DateTime('2013-02-01'));
		$manager->persist($pic_fc_2);
		
// Bord de mer et herbes folles
		$pic_bmhf_1 = new Picture();
		$pic_bmhf_1->setWork($manager->merge($this->getReference('bord_de_mer_et_herbes_folles')));
		$pic_bmhf_1->setPath('/uploads/pictures/bord_de_mer_et_herbes_folles.jpg');
		$pic_bmhf_1->setComment('Travail final');
		$pic_bmhf_1->setIsEnabled(true);
		$pic_bmhf_1->setMainView(true);
		$pic_bmhf_1->setPictureCategory('Final');
		$pic_bmhf_1->setCreatedAt(new \DateTime('1988-08-01'));
		$manager->persist($pic_bmhf_1);
		
// Florence nue
		$pic_fn_1 = new Picture();
		$pic_fn_1->setWork($manager->merge($this->getReference('flo_nue')));
		$pic_fn_1->setPath('/uploads/pictures/flo_nue.jpg');
		$pic_fn_1->setComment('Travail final');
		$pic_fn_1->setIsEnabled(true);
		$pic_fn_1->setMainView(true);
		$pic_fn_1->setPictureCategory('Final');
		$pic_fn_1->setCreatedAt(new \DateTime('2013-04-14'));
		$manager->persist($pic_fn_1);
		
// Patricia
		$pic_pa_1 = new Picture();
		$pic_pa_1->setWork($manager->merge($this->getReference('patricia')));
		$pic_pa_1->setPath('/uploads/pictures/patricia.jpg');
		$pic_pa_1->setComment('Travail final');
		$pic_pa_1->setIsEnabled(true);
		$pic_pa_1->setMainView(true);
		$pic_pa_1->setPictureCategory('Final');
		$pic_pa_1->setCreatedAt(new \DateTime('2013-04-24'));
		$manager->persist($pic_pa_1);
		
// Happy Ella
		$pic_he_1 = new Picture();
		$pic_he_1->setWork($manager->merge($this->getReference('happy_ella')));
		$pic_he_1->setPath('/uploads/pictures/happy_ella.jpg');
		$pic_he_1->setComment('Travail final');
		$pic_he_1->setIsEnabled(true);
		$pic_he_1->setMainView(true);
		$pic_he_1->setPictureCategory('Ebauche');
		$pic_he_1->setCreatedAt(new \DateTime('2013-04-04'));
		$manager->persist($pic_he_1);
		
		$pic_he_2 = new Picture();
		$pic_he_2->setWork($manager->merge($this->getReference('happy_ella')));
		$pic_he_2->setPath('/uploads/pictures/happy_ella.jpg');
		$pic_he_2->setComment('Travail final');
		$pic_he_2->setIsEnabled(true);
		$pic_he_2->setMainView(true);
		$pic_he_2->setPictureCategory('Final');
		$pic_he_2->setCreatedAt(new \DateTime('2013-05-04'));
		$manager->persist($pic_he_2);
		
		$pic_he_3 = new Picture();
		$pic_he_3->setWork($manager->merge($this->getReference('happy_ella')));
		$pic_he_3->setPath('/uploads/pictures/happy_ella.jpg');
		$pic_he_3->setComment('Travail final');
		$pic_he_3->setIsEnabled(true);
		$pic_he_3->setMainView(true);
		$pic_he_3->setPictureCategory('Final');
		$pic_he_3->setCreatedAt(new \DateTime('2013-05-04'));
		$manager->persist($pic_he_3);
		
		$pic_he_4 = new Picture();
		$pic_he_4->setWork($manager->merge($this->getReference('happy_ella')));
		$pic_he_4->setPath('/uploads/pictures/happy_ella.jpg');
		$pic_he_4->setComment('Travail final');
		$pic_he_4->setIsEnabled(true);
		$pic_he_4->setMainView(true);
		$pic_he_4->setPictureCategory('Final');
		$pic_he_4->setCreatedAt(new \DateTime('2013-05-04'));
		$manager->persist($pic_he_4);
		
		$manager->flush();
	}
	
	/**
	 * {@inheritDoc}
	 */
	public function getOrder()
	{
		return 5;
	}
	
}
