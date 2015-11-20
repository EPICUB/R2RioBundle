<?php

namespace Epic\R2RioBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * R2SearchStop
 *
 * @ORM\Table(name="r2_search_stop")
 * @ORM\Entity(repositoryClass="Epic\R2RioBundle\Entity\R2SearchStopRepository")
 */
class R2SearchStop
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
     * @ORM\Column(name="kind", type="string", length=255, nullable=true)
     */
    private $kind;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="pos", type="string", length=255)
     */
    private $pos;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", length=255, nullable=true)
     */
    private $countryCode;

    /**
     * @var string
     *
     * @ORM\Column(name="region_code", type="string", length=255, nullable=true)
     */
    private $regionCode;

    /**
     * @var string
     *
     * @ORM\Column(name="time_zone", type="string", length=255, nullable=true)
     */
    private $timeZone;

    /**
     * @ORM\ManyToOne(targetEntity="Epic\R2RioBundle\Entity\R2SearchRoute", inversedBy="searchStops")
     * @ORM\JoinColumn(name="search_route_id", referencedColumnName="id")
     */
    private $searchRoute;

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
     * Set kind
     *
     * @param string $kind
     * @return R2SearchStop
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind
     *
     * @return string 
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return R2SearchStop
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
     * Set pos
     *
     * @param string $pos
     * @return R2SearchStop
     */
    public function setPos($pos)
    {
        $this->pos = $pos;

        return $this;
    }

    /**
     * Get pos
     *
     * @return string 
     */
    public function getPos()
    {
        return $this->pos;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return R2SearchStop
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
     * Set countryCode
     *
     * @param string $countryCode
     * @return R2SearchStop
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string 
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set regionCode
     *
     * @param string $regionCode
     * @return R2SearchStop
     */
    public function setRegionCode($regionCode)
    {
        $this->regionCode = $regionCode;

        return $this;
    }

    /**
     * Get regionCode
     *
     * @return string 
     */
    public function getRegionCode()
    {
        return $this->regionCode;
    }

    /**
     * Set timeZone
     *
     * @param string $timeZone
     * @return R2SearchStop
     */
    public function setTimeZone($timeZone)
    {
        $this->timeZone = $timeZone;

        return $this;
    }

    /**
     * Get timeZone
     *
     * @return string 
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * Set searchRoute
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchRoute $searchRoute
     * @return R2SearchStop
     */
    public function setSearchRoute(\Epic\R2RioBundle\Entity\R2SearchRoute $searchRoute = null)
    {
        $this->searchRoute = $searchRoute;

        return $this;
    }

    /**
     * Get searchRoute
     *
     * @return \Epic\R2RioBundle\Entity\R2SearchRoute 
     */
    public function getSearchRoute()
    {
        return $this->searchRoute;
    }
}
