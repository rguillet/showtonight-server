<?php

namespace S2n\ShowBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="S2n\ShowBundle\Entity\EventRepository")
 */
class Event
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="text")
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;
    
    /**
     * @ORM\OneToMany(targetEntity="Availability", mappedBy="event")
     */
    protected $availabilities;
    
    public function __toString() {
      return $this->title;
    }

    public function __construct()
    {
        $this->availabilities = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Event
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Event
     */
    public function setImage($image)
    {
        $this->image = $image;
    
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add availabilities
     *
     * @param \S2n\ShowBundle\Entity\Availability $availabilities
     * @return Event
     */
    public function addAvailabilitie(\S2n\ShowBundle\Entity\Availability $availabilities)
    {
        $this->availabilities[] = $availabilities;
    
        return $this;
    }

    /**
     * Remove availabilities
     *
     * @param \S2n\ShowBundle\Entity\Availability $availabilities
     */
    public function removeAvailabilitie(\S2n\ShowBundle\Entity\Availability $availabilities)
    {
        $this->availabilities->removeElement($availabilities);
    }

    /**
     * Get availabilities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAvailabilities()
    {
        return $this->availabilities;
    }
    
    function asMobileObject()
    {
        $result = array();
        $methods = get_class_methods($this);
        foreach($methods as $method) {
            if ('get' == substr($method, 0, 3) && substr($method, 3) != 'Availabilities') {
                $result[strtolower(preg_replace('/(?<=\\w)(?=[A-Z])/',"_$1", substr($method, 3)))] = $this->$method();
            }
        }
        foreach ($this->availabilities as $a)
          $result['availabilities'][$a->getEventDate()->format('Y-m-d')] = $a->asMobileObject();
        $result['description'] = nl2br($this->getDescription());
        return $result;
    }
    
    
}