<?php

namespace Potager\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attribute
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Potager\BusinessBundle\Entity\AttributeRepository")
 */
class Attribute
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
     * @ORM\OneToOne(targetEntity="User", inversedBy="attribute")
     **/
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var integer
     *
     * @ORM\Column(name="xp", type="integer")
     */
    private $xp;

    /**
     * @var integer
     *
     * @ORM\Column(name="strenght", type="integer")
     */
    private $strenght;

    /**
     * @var integer
     *
     * @ORM\Column(name="stamina", type="integer")
     */
    private $stamina;

    /**
     * @var integer
     *
     * @ORM\Column(name="agility", type="integer")
     */
    private $agility;

    /**
     * @var integer
     *
     * @ORM\Column(name="luck", type="integer")
     */
    private $luck;

    public function __construct() {

        $this->level = 1;
        $this->strenght = 5;
        $this->stamina = 5;
        $this->agility = 5;
        $this->luck = 1;
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
     * Set level
     *
     * @param integer $level
     * @return Attribute
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer 
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set strenght
     *
     * @param integer $strenght
     * @return Attribute
     */
    public function setStrenght($strenght)
    {
        $this->strenght = $strenght;

        return $this;
    }

    /**
     * Get strenght
     *
     * @return integer 
     */
    public function getStrenght()
    {
        return $this->strenght;
    }

    /**
     * Set stamina
     *
     * @param integer $stamina
     * @return Attribute
     */
    public function setStamina($stamina)
    {
        $this->stamina = $stamina;

        return $this;
    }

    /**
     * Get stamina
     *
     * @return integer 
     */
    public function getStamina()
    {
        return $this->stamina;
    }

    /**
     * Set agility
     *
     * @param integer $agility
     * @return Attribute
     */
    public function setAgility($agility)
    {
        $this->agility = $agility;

        return $this;
    }

    /**
     * Get agility
     *
     * @return integer 
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * Set luck
     *
     * @param integer $luck
     * @return Attribute
     */
    public function setLuck($luck)
    {
        $this->luck = $luck;

        return $this;
    }

    /**
     * Get luck
     *
     * @return integer 
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * Set user
     *
     * @param \Potager\BusinessBundle\Entity\User $user
     * @return Attribute
     */
    public function setUser(\Potager\BusinessBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Potager\BusinessBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set xp
     *
     * @param integer $xp
     * @return Attribute
     */
    public function setXp($xp)
    {
        $this->xp = $xp;

        return $this;
    }

    /**
     * Get xp
     *
     * @return integer 
     */
    public function getXp()
    {
        return $this->xp;
    }
}
