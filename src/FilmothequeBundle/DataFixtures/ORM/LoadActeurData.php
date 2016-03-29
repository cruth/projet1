<?php
namespace FilmothequeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FilmothequeBundle\Entity\Acteur;

class LoadActeurData extends AbstractFixture implements OrderedFixtureInterface
{
     public function getOrder() {
        return 2;
    }
	
	public function load(ObjectManager $manager)
    {
		$acteurs = [
			[
				'nom'=>'Willis', 
				'prenom'=>'Bruce',
				'dateNaissance'=>'1955-03-19',
				'sexe'=>'M'
			],
			[
				'nom'=>'Eastwood', 
				'prenom'=>'Clint',
				'dateNaissance'=>'1930-05-31',
				'sexe'=>'M'
			],
			[
				'nom'=>'Ford', 
				'prenom'=>'Harrison',
				'dateNaissance'=>'1942-07-13',
				'sexe'=>'M'
			],
			[
				'nom'=>'Winslet', 
				'prenom'=>'Kate',
				'dateNaissance'=>'1975-10-05',
				'sexe'=>'F'
			],
			[
				'nom'=>'Diaz', 
				'prenom'=>'Cameron',
				'dateNaissance'=>'1972-08-30',
				'sexe'=>'F'
			],
			[
				'nom'=>'Volontè', 
				'prenom'=>'Gian Maria',
				'dateNaissance'=>'1933-04-09',
				'sexe'=>'M'
			],
			[
				'nom'=>'Koch', 
				'prenom'=>'Marianne',
				'dateNaissance'=>'1931-08-19',
				'sexe'=>'F'
			],
			[
				'nom'=>'Wallach', 
				'prenom'=>'Eli',
				'dateNaissance'=>'1915-12-07',
				'sexe'=>'M'
			],
			[
				'nom'=>'Van Cleef', 
				'prenom'=>'Lee',
				'dateNaissance'=>'1925-01-09',
				'sexe'=>'M'
			],
			[
				'nom'=>'Bronson', 
				'prenom'=>'Charles',
				'dateNaissance'=>'1921-11-03',
				'sexe'=>'M'
			],
			[
				'nom'=>'Cardinale', 
				'prenom'=>'Claudia',
				'dateNaissance'=>'1938-04-15',
				'sexe'=>'F'
			],
			[
				'nom'=>'Fonda', 
				'prenom'=>'Henri',
				'dateNaissance'=>'1905-05-16',
				'sexe'=>'M'
			],
			[
				'nom'=>'Hauer', 
				'prenom'=>'Rutger',
				'dateNaissance'=>'1944-01-23',
				'sexe'=>'M'
			],
			[
				'nom'=>'Young', 
				'prenom'=>'Sean',
				'dateNaissance'=>'1959-11-20',
				'sexe'=>'F'
			],
			[
				'nom'=>'DiCaprio', 
				'prenom'=>'Leonardo',
				'dateNaissance'=>'1974-11-11',
				'sexe'=>'M'
			],
			[
				'nom'=>'Gordon-Levitt', 
				'prenom'=>'Joseph',
				'dateNaissance'=>'1981-02-17',
				'sexe'=>'M'
			],
			[
				'nom'=>'Page', 
				'prenom'=>'Ellen',
				'dateNaissance'=>'1987-02-21',
				'sexe'=>'F'
			],
			[
				'nom'=>'Dullea', 
				'prenom'=>'Keir',
				'dateNaissance'=>'1936-05-30',
				'sexe'=>'M'
			],
			[
				'nom'=>'Lockwood', 
				'prenom'=>'Gary',
				'dateNaissance'=>'1937-02-21',
				'sexe'=>'M'
			],
			[
				'nom'=>'Jovovich', 
				'prenom'=>'Milla',
				'dateNaissance'=>'1975-12-17',
				'sexe'=>'F'
			],
			[
				'nom'=>'Oldman', 
				'prenom'=>'Gary',
				'dateNaissance'=>'1958-03-21',
				'sexe'=>'M'
			],
			[
				'nom'=>'Rickman', 
				'prenom'=>'Alan',
				'dateNaissance'=>'1946-02-21',
				'sexe'=>'M'
			],
			[
				'nom'=>'Stiller', 
				'prenom'=>'Ben',
				'dateNaissance'=>'1965-11-30',
				'sexe'=>'M'
			],
			[
				'nom'=>'Dillon', 
				'prenom'=>'Matt',
				'dateNaissance'=>'1964-02-18',
				'sexe'=>'M'
			],
			[
				'nom'=>'Carrey', 
				'prenom'=>'Jim',
				'dateNaissance'=>'1962-01-17',
				'sexe'=>'M'
			],
			[
				'nom'=>'Wilkinson', 
				'prenom'=>'Tom',
				'dateNaissance'=>'1948-02-05',
				'sexe'=>'M'
			],
		];
		
		foreach($acteurs as $acteurItem) {
			$acteur = new Acteur();
			$acteur->setNom($acteurItem['nom']);
			$acteur->setPrenom($acteurItem['prenom']);
			$acteur->setDateNaissance(new \DateTime($acteurItem['dateNaissance']));
			$acteur->setSexe($acteurItem['sexe']);

			$manager->persist($acteur);
			
			$this->addReference($acteurItem['prenom'].' '.$acteurItem['nom'], $acteur);
		}
		
        $manager->flush();
    }
}