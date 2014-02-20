<?php

namespace Potager\BusinessBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faction
 *
 * @ORM\Table()
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
     * @ORM\OneToMany(targetEntity="User", mappedBy="faction")
     **/
    private $users;

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
        $this->users = new ArrayCollection();
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
}
