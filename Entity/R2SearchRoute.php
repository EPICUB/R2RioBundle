<?php

namespace Epic\R2RioBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * R2SearchRoute
 *
 * @ORM\Table(name="r2_search_route")
 * @ORM\Entity(repositoryClass="Epic\R2RioBundle\Entity\R2SearchRouteRepository")
 */
class R2SearchRoute
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="distance", type="float")
     */
    private $distance;

    /**
     * @var float
     *
     * @ORM\Column(name="duration", type="float")
     */
    private $duration;

    /**
     * @ORM\ManyToOne(targetEntity="Epic\R2RioBundle\Entity\R2SearchResponse", inversedBy="searchRoutes")
     * @ORM\JoinColumn(name="search_response_id", referencedColumnName="id")
     */
    private $searchResponse;

    /**
     * @ORM\OneToMany(targetEntity="Epic\R2RioBundle\Entity\R2SearchStop", mappedBy="searchRoute")
     */
    private $searchStops;

    /**
     * @ORM\OneToMany(targetEntity="Epic\R2RioBundle\Entity\R2SearchSegment", mappedBy="searchRoute")
     */
    private $searchSegments;

    public function __construct()
    {
        $this->searchStops = new ArrayCollection();
        $this->searchSegments = new ArrayCollection();
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
     * @return R2SearchRoute
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
     * Set distance
     *
     * @param float $distance
     * @return R2SearchRoute
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return float 
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set duration
     *
     * @param float $duration
     * @return R2SearchRoute
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return float 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set searchResponse
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchResponse $searchResponse
     * @return R2SearchRoute
     */
    public function setSearchResponse(\Epic\R2RioBundle\Entity\R2SearchResponse $searchResponse = null)
    {
        $this->searchResponse = $searchResponse;

        return $this;
    }

    /**
     * Get searchResponse
     *
     * @return \Epic\R2RioBundle\Entity\R2SearchResponse 
     */
    public function getSearchResponse()
    {
        return $this->searchResponse;
    }

    /**
     * Add searchStops
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchStop $searchStops
     * @return R2SearchRoute
     */
    public function addSearchStop(\Epic\R2RioBundle\Entity\R2SearchStop $searchStops)
    {
        $this->searchStops[] = $searchStops;

        return $this;
    }

    /**
     * Remove searchStops
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchStop $searchStops
     */
    public function removeSearchStop(\Epic\R2RioBundle\Entity\R2SearchStop $searchStops)
    {
        $this->searchStops->removeElement($searchStops);
    }

    /**
     * Get searchStops
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSearchStops()
    {
        return $this->searchStops;
    }

    /**
     * Add searchSegments
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchSegment $searchSegments
     * @return R2SearchRoute
     */
    public function addSearchSegment(\Epic\R2RioBundle\Entity\R2SearchSegment $searchSegments)
    {
        $this->searchSegments[] = $searchSegments;

        return $this;
    }

    /**
     * Remove searchSegments
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchSegment $searchSegments
     */
    public function removeSearchSegment(\Epic\R2RioBundle\Entity\R2SearchSegment $searchSegments)
    {
        $this->searchSegments->removeElement($searchSegments);
    }

    /**
     * Get searchSegments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSearchSegments()
    {
        return $this->searchSegments;
    }
}
