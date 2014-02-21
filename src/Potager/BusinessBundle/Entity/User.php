<?php

namespace Potager\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Potager\BusinessBundle\Entity\UserRepository")
 */
class User
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
     * @ORM\ManyToOne(targetEntity="Faction", inversedBy="users")
     **/
    private $faction;

     /**
     * @ORM\OneToOne(targetEntity="Attribute")
     **/
    private $attribute;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=255)
     */
    private $avatar;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

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

    /*
     * @ORM\OneToMany(targetEntity="Fight", mappedBy="attacker")
     **/
    private $fightsAttacker;

    /*
     * @ORM\OneToMany(targetEntity="Fight", mappedBy="defender")
     **/
    private $fightsDefender;



    public function __construct()
    {
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
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
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
     * Set email
     *
     * @param string $email
     * @return User
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
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
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
     * @param string $fightLost
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
     * @return string 
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

    public function getAllFight()
    {
        return array_merge($this->fightsAttacker, $this->fightsDefender);
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
}
