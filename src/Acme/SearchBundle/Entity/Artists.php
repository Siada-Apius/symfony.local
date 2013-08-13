<?php

namespace Acme\SearchBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artists
 *
 * @ORM\Table(name="artists")
 * @ORM\Entity
 */
class Artists
{
    /**
     * @var integer
     *
     * @ORM\Column(name="aid", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $aid;

    /**
     * @var string
     *
     * @ORM\Column(name="aname", type="string", length=255, nullable=false)
     */
    private $aname;



    /**
     * Get aid
     *
     * @return integer 
     */
    public function getAid()
    {
        return $this->aid;
    }

    /**
     * Set aname
     *
     * @param string $aname
     * @return Artists
     */
    public function setAname($aname)
    {
        $this->aname = $aname;
    
        return $this;
    }

    /**
     * Get aname
     *
     * @return string 
     */
    public function getAname()
    {
        return $this->aname;
    }
}