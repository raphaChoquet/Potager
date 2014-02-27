<?php

namespace Potager\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Faction
 *
 * @ORM\Table(name="faction")
 * @ORM\Entity(repositoryClass="Potager\BusinessBundle\Entity\FactionRepository")
 */
class Faction
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
     * @ORM\OneToMany(targetEntity="Character", mappedBy="faction")
     **/
    private $characters;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="score", type="integer")
     */
    private $score;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_player", type="integer")
     */
    private $nbrPlayer;


    public function __construct()
    {
        $this->characters = new ArrayCollection();
        $this->score = 0;
        $this->nbrPlayer = 0;
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
     * @return Faction
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
     * Set score
     *
     * @param integer $score
     * @return Faction
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
     * Set nbrPlayer
     *
     * @param integer $nbrPlayer
     * @return Faction
     */
    public function setNbrPlayer($nbrPlayer)
    {
        $this->nbrPlayer = $nbrPlayer;

        return $this;
    }

    /**
     * Get nbrPlayer
     *
     * @return integer 
     */
    public function getNbrPlayer()
    {
        return $this->nbrPlayer;
    }

    /**
     * Add characters
     *
     * @param \Potager\BusinessBundle\Entity\Character $characters
     * @return Faction
     */
    public function addCharacter(\Potager\BusinessBundle\Entity\Character $characters)
    {
        $this->characters[] = $characters;

        return $this;
    }

    /**
     * Remove characters
     *
     * @param \Potager\BusinessBundle\Entity\Character $characters
     */
    public function removeCharacter(\Potager\BusinessBundle\Entity\Character $characters)
    {
        $this->characters->removeElement($characters);
    }

    /**
     * Get characters
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCharacters()
    {
        return $this->characters;
    }
}
