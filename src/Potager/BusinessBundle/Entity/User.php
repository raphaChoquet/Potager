<?php 

// src/Potager/BusinessBundle/Entity/User.php

namespace Potager\BusinessBundle\Entity;

use Sonata\UserBundle\Model\User as BaseUser;
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
     * @ORM\ManyToOne(targetEntity="Avatar")
     **/
    private $avatar;

    /**
     * @var integer
     *
     * @ORM\Column(name="remaining_fight", type="integer")
     */
    private $remainingFight;

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

    /**
     * Get fightWon
     *
     * @return integer 
     */
    public function getFightWon()
    {
         $fightAttackerWin = $this->fightsAttacker->filter(function ($var) {
            return ($var->getAttackerWin() > 0);
         });

         $fightsDefenderWin = $this->fightsDefender->filter(function ($var) {
            return ($var->getAttackerWin() < 0);
         });

        return $fightAttackerWin->count() + $fightsDefenderWin->count();
    }

    /**
     * Get fightLost
     *
     * @return integer 
     */
    public function getFightLost()
    {
         $fightAttackerLost = $this->fightsAttacker->filter(function ($var) {
            return ($var->getAttackerWin() < 0);
         });

         $fightsDefenderLost = $this->fightsDefender->filter(function ($var) {
            return ($var->getAttackerWin() > 0);
         });

        return $fightAttackerLost->count() + $fightsDefenderLost->count();
    }


    /**
     * Get fightDraw
     *
     * @return integer 
     */
    public function getFightDraw()
    {
        $fightAttackerDraw = $this->fightsAttacker->filter(function ($var) {
            return ($var->getAttackerWin() == 0);
         });

         $fightsDefenderDraw = $this->fightsDefender->filter(function ($var) {
            return ($var->getAttackerWin() == 0);
         });

        return $fightAttackerDraw->count() + $fightsDefenderDraw->count();
    }

}
