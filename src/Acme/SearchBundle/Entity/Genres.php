<?php

namespace Acme\SearchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genres
 *
 * @ORM\Table(name="genres")
 * @ORM\Entity
 */
class Genres
{
    /**
     * @var integer
     *
     * @ORM\Column(name="gid", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $gid;

    /**
     * @var string
     *
     * @ORM\Column(name="gtitle", type="string", length=255, nullable=false)
     */
    private $gtitle;



    /**
     * Get gid
     *
     * @return integer 
     */
    public function getGid()
    {
        return $this->gid;
    }

    /**
     * Set gtitle
     *
     * @param string $gtitle
     * @return Genres
     */
    public function setGtitle($gtitle)
    {
        $this->gtitle = $gtitle;
    
        return $this;
    }

    /**
     * Get gtitle
     *
     * @return string 
     */
    public function getGtitle()
    {
        return $this->gtitle;
    }
}