<?php

namespace FilmothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="FilmothequeBundle\Repository\FilmRepository")
 */
class Film
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
	 * @Assert\NotBlank()
     * @Assert\Length(
	 *    min = "3",
	 *    minMessage = "Votre nom doit comporter au moins {{ limit }} caractères."
	 * )
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=255)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @Assert\NotBlank()
     */
    private $categorie;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Acteur")
     */
    private $acteurs;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Film
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Film
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set categorie
     *
     * @param int $categorie
     * @return Film
     */
    public function setCategorie($idCategorie)
    {
        $this->categorie = $idCategorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return int 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set acteurs
     *
     * @param array $acteurs
     * @return Film
     */
    public function setActeurs($acteurs)
    {
        $this->acteurs = $acteurs;

        return $this;
    }

    /**
     * Get acteurs
     *
     * @return array 
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add acteurs
     *
     * @param \FilmothequeBundle\Entity\Acteur $acteurs
     * @return Film
     */
    public function addActeur(\FilmothequeBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs[] = $acteurs;

        return $this;
    }

    /**
     * Remove acteurs
     *
     * @param \FilmothequeBundle\Entity\Acteur $acteurs
     */
    public function removeActeur(\FilmothequeBundle\Entity\Acteur $acteurs)
    {
        $this->acteurs->removeElement($acteurs);
    }
}
