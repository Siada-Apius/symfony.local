<?php

namespace TutorialSF2\SearchEngineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="TutorialSF2\SearchEngineBundle\Repository\FilmRepository")
 */
class Film
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
     * @ORM\Column(name="title", type="string", length=120, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="text", nullable=true)
     */
    private $synopsis;

    /**
     * @var integer
     *
     * @ORM\Column(name="vues", type="integer", nullable=false)
     */
    private $vues;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_parution", type="datetime", nullable=true)
     */
    private $dateParution;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="film")
     * @ORM\JoinTable(name="appartenir",
     *   joinColumns={
     *     @ORM\JoinColumn(name="film_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tag;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acteur", mappedBy="film")
     */
    private $acteur;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
        $this->acteur = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Film
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     * @return Film
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;
    
        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string 
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set vues
     *
     * @param integer $vues
     * @return Film
     */
    public function setVues($vues)
    {
        $this->vues = $vues;
    
        return $this;
    }

    /**
     * Get vues
     *
     * @return integer 
     */
    public function getVues()
    {
        return $this->vues;
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
     * Set dateParution
     *
     * @param \DateTime $dateParution
     * @return Film
     */
    public function setDateParution($dateParution)
    {
        $this->dateParution = $dateParution;
    
        return $this;
    }

    /**
     * Get dateParution
     *
     * @return \DateTime 
     */
    public function getDateParution()
    {
        return $this->dateParution;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Film
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
     * Add tag
     *
     * @param \TutorialSF2\SearchEngineBundle\Entity\Tag $tag
     * @return Film
     */
    public function addTag(\TutorialSF2\SearchEngineBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;
    
        return $this;
    }

    /**
     * Remove tag
     *
     * @param \TutorialSF2\SearchEngineBundle\Entity\Tag $tag
     */
    public function removeTag(\TutorialSF2\SearchEngineBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Add acteur
     *
     * @param \TutorialSF2\SearchEngineBundle\Entity\Acteur $acteur
     * @return Film
     */
    public function addActeur(\TutorialSF2\SearchEngineBundle\Entity\Acteur $acteur)
    {
        $this->acteur[] = $acteur;
    
        return $this;
    }

    /**
     * Remove acteur
     *
     * @param \TutorialSF2\SearchEngineBundle\Entity\Acteur $acteur
     */
    public function removeActeur(\TutorialSF2\SearchEngineBundle\Entity\Acteur $acteur)
    {
        $this->acteur->removeElement($acteur);
    }

    /**
     * Get acteur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * Set category
     *
     * @param \TutorialSF2\SearchEngineBundle\Entity\Categorie $category
     * @return Film
     */
    public function setCategory(\TutorialSF2\SearchEngineBundle\Entity\Categorie $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \TutorialSF2\SearchEngineBundle\Entity\Categorie 
     */
    public function getCategory()
    {
        return $this->category;
    }
}