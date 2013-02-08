<?php

namespace S2n\ShowBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Availability
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Availability
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
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_date", type="date")
     */
    private $event_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="event_time", type="time")
     */
    private $event_time;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;
    
    /**
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="availabilities")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    protected $event;
    
    /**
     * @ORM\OneToMany(targetEntity="Booking", mappedBy="availability")
     */
    protected $bookings;
    
    public function __toString() {
      return $this->event.' - '.$this->event_date->format('Y-m-d').' '.$this->event_time->format('H:i');
    }
    
    public function __construct()
    {
        $this->bookings = new ArrayCollection();
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
     * Set capacity
     *
     * @param integer $capacity
     * @return Availability
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    
        return $this;
    }

    /**
     * Get capacity
     *
     * @return integer 
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set event_date
     *
     * @param \DateTime $eventDate
     * @return Availability
     */
    public function setEventDate($eventDate)
    {
        $this->event_date = $eventDate;
    
        return $this;
    }

    /**
     * Get event_date
     *
     * @return \DateTime 
     */
    public function getEventDate()
    {
        return $this->event_date;
    }

    /**
     * Set event_time
     *
     * @param \DateTime $eventTime
     * @return Availability
     */
    public function setEventTime($eventTime)
    {
        $this->event_time = $eventTime;
    
        return $this;
    }

    /**
     * Get event_time
     *
     * @return \DateTime 
     */
    public function getEventTime()
    {
        return $this->event_time;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Availability
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set event
     *
     * @param \S2n\ShowBundle\Entity\Event $event
     * @return Availability
     */
    public function setEvent(\S2n\ShowBundle\Entity\Event $event = null)
    {
        $this->event = $event;
    
        return $this;
    }

    /**
     * Get event
     *
     * @return \S2n\ShowBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Add bookings
     *
     * @param \S2n\ShowBundle\Entity\Booking $bookings
     * @return Availability
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