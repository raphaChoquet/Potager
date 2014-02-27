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
     * @ORM\OneToOne(targetEntity="User", inversedBy="attribut")
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
     * @ORM\Column(name="hp", type="integer")
     */
    private $hp;

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
     * Set hp
     *
     * @param integer $hp
     * @return Attribute
     */
    public function setHp($hp)
    {
        $this->hp = $hp;

        return $this;
    }

    /**
     * Get hp
     *
     * @return integer 
     */
    public function getHp()
    {
        return $this->hp;
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
}
