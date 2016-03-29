<?php
namespace FilmothequeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FilmothequeBundle\Entity\Film;

class LoadFilmData extends AbstractFixture implements OrderedFixtureInterface
{
    public function getOrder() {
        return 3;
    }
	
	public function load(ObjectManager $manager)
    {
		$films = [
			[
				'titre'=>'Pour une poignée de dollars',
				'description'=>'A wandering gunfighter plays two rival families against each other in a town torn apart by greed, pride, and revenge.',
				'categorie'=>'western',
				'acteurs'=>['Clint Eastwood', 'Gian Maria Volontè', 'Marianne Koch']
			],
			[
				'titre'=>'Le bon, la brute et le truand',
				'description'=>'A bounty hunting scam joins two men in an uneasy alliance against a third in a race to find a fortune in gold buried in a remote cemetery.',
				'categorie'=>'western',
				'acteurs'=>['Clint Eastwood', 'Eli Wallach', 'Lee Van Cleef']
			],
			[
				'titre'=>'Il était une fois dans l\'ouest',
				'description'=>'Epic story of a mysterious stranger with a harmonica who joins forces with a notorious desperado to protect a beautiful widow from a ruthless assassin working for the railroad.',
				'categorie'=>'western',
				'acteurs'=>['Charles Bronson', 'Claudia Cardinale', 'Henri Fonda']
			],
			[
				'titre'=>'Blade Runner',
				'description'=>'A blade runner must pursue and try to terminate four replicants who stole a ship in space and have returned to Earth to find their creator.',
				'categorie'=>'science-fiction',
				'acteurs'=>['Harrison Ford', 'Rutger Hauer', 'Sean Young']
			],
			[
				'titre'=>'Inception',
				'description'=>'A thief, who steals corporate secrets through use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO.',
				'categorie'=>'science-fiction',
				'acteurs'=>['Leonardo DiCaprio', 'Joseph Gordon-Levitt', 'Ellen Page']
			],
			[
				'titre'=>'2001, l\'odyssée de l\'espace',
				'description'=>'Humanity finds a mysterious, obviously artificial object buried beneath the Lunar surface and, with the intelligent computer H.A.L. 9000, sets off on a quest.',
				'categorie'=>'science-fiction',
				'acteurs'=>['Keir Dullea', 'Gary Lockwood']
			],
			[
				'titre'=>'Le cinquième élément',
				'description'=>'In the colorful future, a cab driver unwittingly becomes the central figure in the search for a legendary cosmic weapon to keep Evil and Mr Zorg at bay.',
				'categorie'=>'science-fiction',
				'acteurs'=>['Bruce Willis', 'Milla Jovovich', 'Gary Oldman']
			],
			[
				'titre'=>'Piège de cristal',
				'description'=>'John McClane, officer of the NYPD, tries to save his wife Holly Gennaro and several others that were taken hostage by German terrorist Hans Gruber during a Christmas party at the Nakatomi Plaza in Los Angeles.',
				'categorie'=>'action',
				'acteurs'=>['Bruce Willis', 'Alan Rickman']
			],
			[
				'titre'=>'Mary à tout prix',
				'description'=>'A man gets a chance to meet up with his dream girl from highschool, even though his date with her back then was a complete disaster.',
				'categorie'=>'romance',
				'acteurs'=>['Ben Stiller', 'Cameron Diaz', 'Matt Dillon']
			],
			[
				'titre'=>'Titanic',
				'description'=>'A seventeen-year-old aristocrat falls in love with a kind, but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.',
				'categorie'=>'romance',
				'acteurs'=>['Leonardo DiCaprio', 'Kate Winslet']
			],
			[
				'titre'=>'Eternal Sunshine of the spotless mind',
				'description'=>'When their relationship turns sour, a couple undergoes a procedure to have each other erased from their memories. But it is only through the process of loss that they discover what they had to begin with.',
				'categorie'=>'romance',
				'acteurs'=>['Jim Carrey', 'Kate Winslet', 'Tom Wilkinson']
			],
		];
		
		foreach($films as $filmItem) {
			$film = new Film();
			$film->setTitre($filmItem['titre']);
			$film->setDescription($filmItem['description']);
			$film->setCategorie($this->getReference($filmItem['categorie']));
			foreach($filmItem['acteurs'] as $acteur) {
				$film->addActeur($this->getReference($acteur));
			}
			
			$manager->persist($film);
		}
		
        $manager->flush();
    }
}