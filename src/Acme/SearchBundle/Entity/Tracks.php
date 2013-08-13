<?php

namespace Acme\SearchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tracks
 *
 * @ORM\Table(name="tracks")
 * @ORM\Entity
 */
class Tracks
{
    /**
     * @var integer
     *
     * @ORM\Column(name="discs_did", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $discsDid;

    /**
     * @var integer
     *
     * @ORM\Column(name="tnumber", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $tnumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="artists_aid", type="bigint", nullable=false)
     */
    private $artistsAid;

    /**
     * @var string
     *
     * @ORM\Column(name="ttitle", type="string", length=255, nullable=false)
     */
    private $ttitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="tseconds", type="integer", nullable=false)
     */
    private $tseconds;



    /**
     * Set discsDid
     *
     * @param integer $discsDid
     * @return Tracks
     */
    public function setDiscsDid($discsDid)
    {
        $this->discsDid = $discsDid;
    
        return $this;
    }

    /**
     * Get discsDid
     *
     * @return integer 
     */
    public function getDiscsDid()
    {
        return $this->discsDid;
    }

    /**
     * Set tnumber
     *
     * @param integer $tnumber
     * @return Tracks
     */
    public function setTnumber($tnumber)
    {
        $this->tnumber = $tnumber;
    
        return $this;
    }

    /**
     * Get tnumber
     *
     * @return integer 
     */
    public function getTnumber()
    {
        return $this->tnumber;
    }

    /**
     * Set artistsAid
     *
     * @param integer $artistsAid
     * @return Tracks
     */
    public function setArtistsAid($artistsAid)
    {
        $this->artistsAid = $artistsAid;
    
        return $this;
    }

    /**
     * Get artistsAid
     *
     * @return integer 
     */
    public function getArtistsAid()
    {
        return $this->artistsAid;
    }

    /**
     * Set ttitle
     *
     * @param string $ttitle
     * @return Tracks
     */
    public function setTtitle($ttitle)
    {
        $this->ttitle = $ttitle;
    
        return $this;
    }

    /**
     * Get ttitle
     *
     * @return string 
     */
    public function getTtitle()
    {
        return $this->ttitle;
    }

    /**
     * Set tseconds
     *
     * @param integer $tseconds
     * @return Tracks
     */
    public function setTseconds($tseconds)
    {
        $this->tseconds = $tseconds;
    
        return $this;
    }

    /**
     * Get tseconds
     *
     * @return integer 
     */
    public function getTseconds()
    {
        return $this->tseconds;
    }
}