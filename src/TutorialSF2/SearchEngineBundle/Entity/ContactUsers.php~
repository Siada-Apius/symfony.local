<?php

namespace TutorialSF2\SearchEngineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactUsers
 *
 * @ORM\Table(name="contact_users")
 * @ORM\Entity
 */
class ContactUsers
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
     * @ORM\Column(name="nom", type="string", length=100, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="sujet", type="integer", nullable=true)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;



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
     * @return ContactUsers
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
     * Set email
     *
     * @param string $email
     * @return ContactUsers
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sujet
     *
     * @param integer $sujet
     * @return ContactUsers
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;
    
        return $this;
    }

    /**
     * Get sujet
     *
     * @return integer 
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return ContactUsers
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return ContactUsers
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
}