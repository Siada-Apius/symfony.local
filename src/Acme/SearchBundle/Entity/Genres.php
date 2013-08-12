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
    public function getId()
    {
        return $this->gid;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->gtitle;
    }

}
