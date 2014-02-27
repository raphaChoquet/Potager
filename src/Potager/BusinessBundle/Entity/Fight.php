<?php

namespace Potager\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fight
 *
 * @ORM\Table(name="fight")
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

    /**
     * @ORM\ManyToOne(targetEntity="Character", inversedBy="fightsAttacker")
     **/
    private $attacker;

    /**
     * @ORM\ManyToOne(targetEntity="Character", inversedBy="fightsDefender")
     **/
    private $defender;

    /**
     * @var boolean
     *
     * @ORM\Column(name="attacker_win", type="boolean")
     */
    private $attackerWin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime("now");
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


    /**
     * Set attacker
     *
     * @param \Potager\BusinessBundle\Entity\Character $attacker
     * @return Fight
     */
    public function setAttacker(\Potager\BusinessBundle\Entity\Character $attacker = null)
    {
        $this->attacker = $attacker;

        return $this;
    }

    /**
     * Get attacker
     *
     * @return \Potager\BusinessBundle\Entity\Character 
     */
    public function getAttacker()
    {
        return $this->attacker;
    }

    /**
     * Set defender
     *
     * @param \Potager\BusinessBundle\Entity\Character $defender
     * @return Fight
     */
    public function setDefender(\Potager\BusinessBundle\Entity\Character $defender = null)
    {
        $this->defender = $defender;

        return $this;
    }

    /**
     * Get defender
     *
     * @return \Potager\BusinessBundle\Entity\Character 
     */
    public function getDefender()
    {
        return $this->defender;
    }

    /**
     * Set attackerWin
     *
     * @param boolean $attackerWin
     * @return Fight
     */
    public function setAttackerWin($attackerWin)
    {
        $this->attackerWin = $attackerWin;

        return $this;
    }

    /**
     * Get attackerWin
     *
     * @return boolean 
     */
    public function getAttackerWin()
    {
        return $this->attackerWin;
    }
}
