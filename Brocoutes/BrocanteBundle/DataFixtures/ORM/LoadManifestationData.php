<?php
namespace Brocoutes\BrocanteBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Brocoutes\BrocanteBundle\Entity\Manifestation;
 
class LoadManifestationData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
         $brocante1 = new Manifestation();
         $brocante1->setNom('Brocante Aout');
         $brocante1->setLieu('Bazeilles');
         $brocante1->setDateouverture(new \DateTime('+30 days'));
         $brocante1->setDatefermeture(new \DateTime('+30 days'));
         $brocante1->setCreation(new \DateTime('now'));
         $brocante1->setMiseajour(new \DateTime('now'));
 
         $em->persist($brocante1);
         $em->flush();
    }
 
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
