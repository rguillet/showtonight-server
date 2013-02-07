<?php

namespace S2n\ShowBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Booking
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
     * @var integer
     *
     * @ORM\Column(name="nb_people", type="integer")
     */
    private $nb_people;
    
    /**
     * @ORM\ManyToOne(targetEntity="Availability", inversedBy="bookings")
     * @ORM\JoinColumn(name="availability_id", referencedColumnName="id")
     */
    protected $availability;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="bookings")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;


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
     * Set nb_people
     *
     * @param integer $nbPeople
     * @return Booking
     */
    public function setNbPeople($nbPeople)
    {
        $this->nb_people = $nbPeople;
    
        return $this;
    }

    /**
     * Get nb_people
     *
     * @return integer 
     */
    public function getNbPeople()
    {
        return $this->nb_people;
    }

    /**
     * Set availability
     *
     * @param \S2n\ShowBundle\Entity\Availability $availability
     * @return Booking
     */
    public function setAvailability(\S2n\ShowBundle\Entity\Availability $availability = null)
    {
        $this->availability = $availability;
    
        return $this;
    }

    /**
     * Get availability
     *
     * @return \S2n\ShowBundle\Entity\Availability 
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * Set user
     *
     * @param \S2n\ShowBundle\Entity\User $user
     * @return Booking
     */
    public function setUser(\S2n\ShowBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \S2n\ShowBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}