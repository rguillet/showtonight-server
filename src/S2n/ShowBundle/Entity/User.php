<?php

namespace S2n\ShowBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
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
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="user")
     */
    protected $bookings;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
        parent::__construct();
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
     * Add bookings
     *
     * @param \S2n\ShowBundle\Entity\Booking $bookings
     * @return User
     */
    public function addBooking(\S2n\ShowBundle\Entity\Booking $bookings)
    {
        $this->bookings[] = $bookings;
    
        return $this;
    }

    /**
     * Remove bookings
     *
     * @param \S2n\ShowBundle\Entity\Booking $bookings
     */
    public function removeBooking(\S2n\ShowBundle\Entity\Booking $bookings)
    {
        $this->bookings->removeElement($bookings);
    }

    /**
     * Get bookings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBookings()
    {
        return $this->bookings;
    }
}