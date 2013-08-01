<?php

namespace TutorialSF2\SearchEngineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medias
 *
 * @ORM\Table(name="medias")
 * @ORM\Entity
 */
class Medias
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
     * @ORM\Column(name="legend", type="string", length=120, nullable=true)
     */
    private $legend;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=150, nullable=true)
     */
    private $picture;

    /**
     * @var boolean
     *
     * @ORM\Column(name="state", type="boolean", nullable=true)
     */
    private $state;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_updated", type="datetime", nullable=true)
     */
    private $dateUpdated;

    /**
     * @var \Film
     *
     * @ORM\ManyToOne(targetEntity="Film")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="film_id", referencedColumnName="id")
     * })
     */
    private $film;



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
     * Set legend
     *
     * @param string $legend
     * @return Medias
     */
    public function setLegend($legend)
    {
        $this->legend = $legend;
    
        return $this;
    }

    /**
     * Get legend
     *
     * @return string 
     */
    public function getLegend()
    {
        return $this->legend;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Medias
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set state
     *
     * @param boolean $state
     * @return Medias
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return boolean 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Medias
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    
        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     * @return Medias
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
    
        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime 
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * Set film
     *
     * @param \TutorialSF2\SearchEngineBundle\Entity\Film $film
     * @return Medias
     */
    public function setFilm(\TutorialSF2\SearchEngineBundle\Entity\Film $film = null)
    {
        $this->film = $film;
    
        return $this;
    }

    /**
     * Get film
     *
     * @return \TutorialSF2\SearchEngineBundle\Entity\Film 
     */
    public function getFilm()
    {
        return $this->film;
    }
}