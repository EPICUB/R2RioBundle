<?php

namespace Epic\R2RioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * R2SearchAircraft
 *
 * @ORM\Table(name="r2_search_aircraft")
 * @ORM\Entity(repositoryClass="Epic\R2RioBundle\Entity\R2SearchAircraftRepository")
 */
class R2SearchAircraft
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="manufacturer", type="string", length=255)
     */
    private $manufacturer;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255)
     */
    private $model;

    /**
     * @ORM\ManyToOne(targetEntity="Epic\R2RioBundle\Entity\R2SearchResponse", inversedBy="searchAircrafts")
     * @ORM\JoinColumn(name="search_response_id", referencedColumnName="id")
     */
    private $searchResponse;


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
     * Set code
     *
     * @param string $code
     * @return R2SearchAircraft
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set manufacturer
     *
     * @param string $manufacturer
     * @return R2SearchAircraft
     */
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * Get manufacturer
     *
     * @return string 
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return R2SearchAircraft
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string 
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set searchResponse
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchResponse $searchResponse
     * @return R2SearchAircraft
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
}
