<?php
namespace FilmothequeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FilmothequeBundle\Entity\Categorie;

class LoadCategorieData extends AbstractFixture implements OrderedFixtureInterface
{
     public function getOrder() {
        return 1;
    }
	
	public function load(ObjectManager $manager)
    {
		$cats = ['western', 'science-fiction', 'romance', 'drame', 'action', 'thriller'];
		
		foreach($cats as $cat) {
			$categorie = new Categorie();
			$categorie->setNom($cat);
			$manager->persist($categorie);
			
			$this->addReference($cat, $categorie);
		}
		
        $manager->flush();
    }
}