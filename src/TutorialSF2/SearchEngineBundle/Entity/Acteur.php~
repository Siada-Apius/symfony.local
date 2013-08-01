<?php

namespace TutorialSF2\SearchEngineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acteur
 *
 * @ORM\Table(name="acteur")
 * @ORM\Entity
 */
class Acteur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=120, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=120, nullable=true)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=true)
     */
    private $dob;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Film", inversedBy="acteur")
     * @ORM\JoinTable(name="jouer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="acteur_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="film_id", referencedColumnName="id")
     *   }
     * )
     */
    private $film;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->film = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

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
     * Set nom
     *
     * @param string $nom
     * @return Acteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Acteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dob
     *
     * @param \DateTime $dob
     * @return Acteur
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    
        return $this;
    }

    /**
     * Get dob
     *
     * @return \DateTime 
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Add film
     *
     * @param \TutorialSF2\SearchEngineBundle\Entity\Film $film
     * @return Acteur
     */
    public function addFilm(\TutorialSF2\SearchEngineBundle\Entity\Film $film)
    {
        $this->film[] = $film;
    
        return $this;
    }

    /**
     * Remove film
     *
     * @param \TutorialSF2\SearchEngineBundle\Entity\Film $film
     */
    public function removeFilm(\TutorialSF2\SearchEngineBundle\Entity\Film $film)
    {
        $this->film->removeElement($film);
    }

    /**
     * Get film
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFilm()
    {
        return $this->film;
    }
}