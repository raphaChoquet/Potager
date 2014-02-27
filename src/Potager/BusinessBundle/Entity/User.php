<?php 

// src/Potager/BusinessBundle/Entity/User.php

namespace Potager\BusinessBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Faction", inversedBy="users")
     **/
    private $faction;

    /**
     * @ORM\OneToOne(targetEntity="Attribute", mappedBy="user")
     **/
    private $attribute;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255)
     */
    private $avatar;

    /**
     * @var integer
     *
     * @ORM\Column(name="remaining_fight", type="integer")
     */
    private $remainingFight;

    /**
     * @var integer
     *
     * @ORM\Column(name="fight_won", type="integer")
     */
    private $fightWon;

    /**
     * @var string
     *
     * @ORM\Column(name="fight_lost", type="integer")
     */
    private $fightLost;

    /**
     * @var integer
     *
     * @ORM\Column(name="score", type="integer")
     */
    private $score;

    /**
     * @ORM\OneToMany(targetEntity="Fight", mappedBy="attacker")
     **/
    private $fightsAttacker;

    /**
     * @ORM\OneToMany(targetEntity="Fight", mappedBy="defender")
     **/
    private $fightsDefender;

    public function __construct()
    {
        parent::__construct();
        $this->fightsAttacker = new ArrayCollection();
        $this->fightsDefender = new ArrayCollection();
        $this->remainingFight = 5;
        $this->fightWon = 0;
        $this->fightLost = 0;
        $this->score = 0;
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
     * Set avatar
     *
     * @param string $avatar
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set remainingFight
     *
     * @param integer $remainingFight
     * @return User
     */
    public function setRemainingFight($remainingFight)
    {
        $this->remainingFight = $remainingFight;

        return $this;
    }

    /**
     * Get remainingFight
     *
     * @return integer 
     */
    public function getRemainingFight()
    {
        return $this->remainingFight;
    }

    /**
     * Set fightWon
     *
     * @param integer $fightWon
     * @return User
     */
    public function setFightWon($fightWon)
    {
        $this->fightWon = $fightWon;

        return $this;
    }

    /**
     * Get fightWon
     *
     * @return integer 
     */
    public function getFightWon()
    {
        return $this->fightWon;
    }

    /**
     * Set fightLost
     *
     * @param integer $fightLost
     * @return User
     */
    public function setFightLost($fightLost)
    {
        $this->fightLost = $fightLost;

        return $this;
    }

    /**
     * Get fightLost
     *
     * @return integer 
     */
    public function getFightLost()
    {
        return $this->fightLost;
    }

    /**
     * Set score
     *
     * @param integer $score
     * @return User
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set faction
     *
     * @param \Potager\BusinessBundle\Entity\Faction $faction
     * @return User
     */
    public function setFaction(\Potager\BusinessBundle\Entity\Faction $faction = null)
    {
        $this->faction = $faction;

        return $this;
    }

    /**
     * Get faction
     *
     * @return \Potager\BusinessBundle\Entity\Faction 
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * Set attribute
     *
     * @param \Potager\BusinessBundle\Entity\Attribute $attribute
     * @return User
     */
    public function setAttribute(\Potager\BusinessBundle\Entity\Attribute $attribute = null)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * Get attribute
     *
     * @return \Potager\BusinessBundle\Entity\Attribute 
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * Add fightsAttacker
     *
     * @param \Potager\BusinessBundle\Entity\Fight $fightsAttacker
     * @return User
     */
    public function addFightsAttacker(\Potager\BusinessBundle\Entity\Fight $fightsAttacker)
    {
        $this->fightsAttacker[] = $fightsAttacker;

        return $this;
    }

    /**
     * Remove fightsAttacker
     *
     * @param \Potager\BusinessBundle\Entity\Fight $fightsAttacker
     */
    public function removeFightsAttacker(\Potager\BusinessBundle\Entity\Fight $fightsAttacker)
    {
        $this->fightsAttacker->removeElement($fightsAttacker);
    }

    /**
     * Get fightsAttacker
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFightsAttacker()
    {
        return $this->fightsAttacker;
    }

    /**
     * Add fightsDefender
     *
     * @param \Potager\BusinessBundle\Entity\Fight $fightsDefender
     * @return User
     */
    public function addFightsDefender(\Potager\BusinessBundle\Entity\Fight $fightsDefender)
    {
        $this->fightsDefender[] = $fightsDefender;

        return $this;
    }

    /**
     * Remove fightsDefender
     *
     * @param \Potager\BusinessBundle\Entity\Fight $fightsDefender
     */
    public function removeFightsDefender(\Potager\BusinessBundle\Entity\Fight $fightsDefender)
    {
        $this->fightsDefender->removeElement($fightsDefender);
    }

    /**
     * Get fightsDefender
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFightsDefender()
    {
        return $this->fightsDefender;
    }
}
