<?php

namespace Epic\R2RioBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * R2SearchResponse
 *
 * @ORM\Table(name="r2_search_response")
 * @ORM\Entity(repositoryClass="Epic\R2RioBundle\Entity\R2SearchResponseRepository")
 */
class R2SearchResponse
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
     * @ORM\OneToOne(targetEntity="Epic\R2RioBundle\Entity\R2SearchRequest", inversedBy="searchResponse")
     * @ORM\JoinColumn(name="search_request_id", referencedColumnName="id")
     */
    private $searchRequest;

    /**
     * @ORM\OneToMany(targetEntity="Epic\R2RioBundle\Entity\R2SearchPlace", mappedBy="searchResponse")
     */
    private $searchPlaces;

    /**
     * @ORM\OneToMany(targetEntity="Epic\R2RioBundle\Entity\R2SearchAirport", mappedBy="searchResponse")
     */
    private $searchAirports;

    /**
     * @ORM\OneToMany(targetEntity="Epic\R2RioBundle\Entity\R2SearchAirline", mappedBy="searchResponse")
     */
    private $searchAirlines;

    /**
     * @ORM\OneToMany(targetEntity="Epic\R2RioBundle\Entity\R2SearchAircraft", mappedBy="searchResponse")
     */
    private $searchAircrafts;

    /**
     * @ORM\OneToMany(targetEntity="Epic\R2RioBundle\Entity\R2SearchAgency", mappedBy="searchResponse")
     */
    private $searchAgencies;

    /**
     * @ORM\OneToMany(targetEntity="Epic\R2RioBundle\Entity\R2SearchRoute", mappedBy="searchResponse")
     */
    private $searchRoutes;

    public function __construct()
    {
        $this->searchPlaces = new ArrayCollection();
        $this->searchAirports = new ArrayCollection();
        $this->searchAirlines = new ArrayCollection();
        $this->searchAircrafts = new ArrayCollection();
        $this->searchAgencies = new ArrayCollection();
        $this->searchRoutes = new ArrayCollection();
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
     * Set searchRequest
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchRequest $searchRequest
     * @return R2SearchResponse
     */
    public function setSearchRequest(\Epic\R2RioBundle\Entity\R2SearchRequest $searchRequest = null)
    {
        $this->searchRequest = $searchRequest;

        return $this;
    }

    /**
     * Get searchRequest
     *
     * @return \Epic\R2RioBundle\Entity\R2SearchRequest 
     */
    public function getSearchRequest()
    {
        return $this->searchRequest;
    }

    /**
     * Add searchPlaces
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchPlace $searchPlaces
     * @return R2SearchResponse
     */
    public function addSearchPlace(\Epic\R2RioBundle\Entity\R2SearchPlace $searchPlaces)
    {
        $this->searchPlaces[] = $searchPlaces;

        return $this;
    }

    /**
     * Remove searchPlaces
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchPlace $searchPlaces
     */
    public function removeSearchPlace(\Epic\R2RioBundle\Entity\R2SearchPlace $searchPlaces)
    {
        $this->searchPlaces->removeElement($searchPlaces);
    }

    /**
     * Get searchPlaces
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSearchPlaces()
    {
        return $this->searchPlaces;
    }

    /**
     * Add searchAirports
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchAirport $searchAirports
     * @return R2SearchResponse
     */
    public function addSearchAirport(\Epic\R2RioBundle\Entity\R2SearchAirport $searchAirports)
    {
        $this->searchAirports[] = $searchAirports;

        return $this;
    }

    /**
     * Remove searchAirports
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchAirport $searchAirports
     */
    public function removeSearchAirport(\Epic\R2RioBundle\Entity\R2SearchAirport $searchAirports)
    {
        $this->searchAirports->removeElement($searchAirports);
    }

    /**
     * Get searchAirports
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSearchAirports()
    {
        return $this->searchAirports;
    }

    /**
     * Add searchAirlines
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchAirline $searchAirlines
     * @return R2SearchResponse
     */
    public function addSearchAirline(\Epic\R2RioBundle\Entity\R2SearchAirline $searchAirlines)
    {
        $this->searchAirlines[] = $searchAirlines;

        return $this;
    }

    /**
     * Remove searchAirlines
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchAirline $searchAirlines
     */
    public function removeSearchAirline(\Epic\R2RioBundle\Entity\R2SearchAirline $searchAirlines)
    {
        $this->searchAirlines->removeElement($searchAirlines);
    }

    /**
     * Get searchAirlines
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSearchAirlines()
    {
        return $this->searchAirlines;
    }

    /**
     * Add searchAircrafts
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchAircraft $searchAircrafts
     * @return R2SearchResponse
     */
    public function addSearchAircraft(\Epic\R2RioBundle\Entity\R2SearchAircraft $searchAircrafts)
    {
        $this->searchAircrafts[] = $searchAircrafts;

        return $this;
    }

    /**
     * Remove searchAircrafts
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchAircraft $searchAircrafts
     */
    public function removeSearchAircraft(\Epic\R2RioBundle\Entity\R2SearchAircraft $searchAircrafts)
    {
        $this->searchAircrafts->removeElement($searchAircrafts);
    }

    /**
     * Get searchAircrafts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSearchAircrafts()
    {
        return $this->searchAircrafts;
    }

    /**
     * Add searchAgencies
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchAgency $searchAgencies
     * @return R2SearchResponse
     */
    public function addSearchAgency(\Epic\R2RioBundle\Entity\R2SearchAgency $searchAgencies)
    {
        $this->searchAgencies[] = $searchAgencies;

        return $this;
    }

    /**
     * Remove searchAgencies
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchAgency $searchAgencies
     */
    public function removeSearchAgency(\Epic\R2RioBundle\Entity\R2SearchAgency $searchAgencies)
    {
        $this->searchAgencies->removeElement($searchAgencies);
    }

    /**
     * Get searchAgencies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSearchAgencies()
    {
        return $this->searchAgencies;
    }

    /**
     * Add searchRoutes
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchRoute $searchRoutes
     * @return R2SearchResponse
     */
    public function addSearchRoute(\Epic\R2RioBundle\Entity\R2SearchRoute $searchRoutes)
    {
        $this->searchRoutes[] = $searchRoutes;

        return $this;
    }

    /**
     * Remove searchRoutes
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchRoute $searchRoutes
     */
    public function removeSearchRoute(\Epic\R2RioBundle\Entity\R2SearchRoute $searchRoutes)
    {
        $this->searchRoutes->removeElement($searchRoutes);
    }

    /**
     * Get searchRoutes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSearchRoutes()
    {
        return $this->searchRoutes;
    }
}
