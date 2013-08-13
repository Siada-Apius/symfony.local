<?php

namespace Acme\SearchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Discs
 *
 * @ORM\Table(name="discs")
 * @ORM\Entity
 */
class Discs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="did", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $did;

    /**
     * @var integer
     *
     * @ORM\Column(name="freedbdiscid", type="bigint", nullable=false)
     */
    private $freedbdiscid;

    /**
     * @var integer
     *
     * @ORM\Column(name="artists_aid", type="bigint", nullable=false)
     */
    private $artistsAid;

    /**
     * @var string
     *
     * @ORM\Column(name="dtitle", type="string", length=241, nullable=false)
     */
    private $dtitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="genres_gid", type="bigint", nullable=false)
     */
    private $genresGid;

    /**
     * @var string
     *
     * @ORM\Column(name="dreleased", type="string", length=4, nullable=true)
     */
    private $dreleased;

    /**
     * @var integer
     *
     * @ORM\Column(name="dtracks", type="integer", nullable=false)
     */
    private $dtracks;

    /**
     * @var integer
     *
     * @ORM\Column(name="dseconds", type="integer", nullable=false)
     */
    private $dseconds;

    /**
     * @var string
     *
     * @ORM\Column(name="dlang", type="string", length=255, nullable=true)
     */
    private $dlang;



    /**
     * Get did
     *
     * @return integer 
     */
    public function getDid()
    {
        return $this->did;
    }

    /**
     * Set freedbdiscid
     *
     * @param integer $freedbdiscid
     * @return Discs
     */
    public function setFreedbdiscid($freedbdiscid)
    {
        $this->freedbdiscid = $freedbdiscid;
    
        return $this;
    }

    /**
     * Get freedbdiscid
     *
     * @return integer 
     */
    public function getFreedbdiscid()
    {
        return $this->freedbdiscid;
    }

    /**
     * Set artistsAid
     *
     * @param integer $artistsAid
     * @return Discs
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
     * Set dtitle
     *
     * @param string $dtitle
     * @return Discs
     */
    public function setDtitle($dtitle)
    {
        $this->dtitle = $dtitle;
    
        return $this;
    }

    /**
     * Get dtitle
     *
     * @return string 
     */
    public function getDtitle()
    {
        return $this->dtitle;
    }

    /**
     * Set genresGid
     *
     * @param integer $genresGid
     * @return Discs
     */
    public function setGenresGid($genresGid)
    {
        $this->genresGid = $genresGid;
    
        return $this;
    }

    /**
     * Get genresGid
     *
     * @return integer 
     */
    public function getGenresGid()
    {
        return $this->genresGid;
    }

    /**
     * Set dreleased
     *
     * @param string $dreleased
     * @return Discs
     */
    public function setDreleased($dreleased)
    {
        $this->dreleased = $dreleased;
    
        return $this;
    }

    /**
     * Get dreleased
     *
     * @return string 
     */
    public function getDreleased()
    {
        return $this->dreleased;
    }

    /**
     * Set dtracks
     *
     * @param integer $dtracks
     * @return Discs
     */
    public function setDtracks($dtracks)
    {
        $this->dtracks = $dtracks;
    
        return $this;
    }

    /**
     * Get dtracks
     *
     * @return integer 
     */
    public function getDtracks()
    {
        return $this->dtracks;
    }

    /**
     * Set dseconds
     *
     * @param integer $dseconds
     * @return Discs
     */
    public function setDseconds($dseconds)
    {
        $this->dseconds = $dseconds;
    
        return $this;
    }

    /**
     * Get dseconds
     *
     * @return integer 
     */
    public function getDseconds()
    {
        return $this->dseconds;
    }

    /**
     * Set dlang
     *
     * @param string $dlang
     * @return Discs
     */
    public function setDlang($dlang)
    {
        $this->dlang = $dlang;
    
        return $this;
    }

    /**
     * Get dlang
     *
     * @return string 
     */
    public function getDlang()
    {
        return $this->dlang;
    }
}