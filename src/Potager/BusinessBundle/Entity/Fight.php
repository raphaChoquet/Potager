<?php

namespace Potager\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fight
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Potager\BusinessBundle\Entity\FightRepository")
 */
class Fight
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /*
     * @ORM\ManyToOne(targetEntity="User", inversedBy="fightsAttacker")
     **/
    private $attacker;

    /*
     * @ORM\ManyToOne(targetEntity="User", inversedBy="fightsDefender")
     **/
    private $defender;

    /**
     * @var boolean
     *
     * @ORM\Column(name="winnner", type="integer")
     */
    private $winnner;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * Set isWin
     *
     * @param boolean $isWin
     * @return Fight
     */
    public function setIsWin($isWin)
    {
        $this->isWin = $isWin;

        return $this;
    }

    /**
     * Get isWin
     *
     * @return boolean 
     */
    public function getIsWin()
    {
        return $this->isWin;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Fight
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
