<?php

namespace Epic\R2RioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * R2SearchSegment
 *
 * @ORM\Table(name="r2_search_segment")
 * @ORM\Entity(repositoryClass="Epic\R2RioBundle\Entity\R2SearchSegmentRepository")
 */
class R2SearchSegment
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
     * @ORM\Column(name="kind", type="string", length=255)
     */
    private $kind;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_kind", type="string", length=255, nullable=true)
     */
    private $subKind;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_major", type="boolean")
     */
    private $isMajor = false;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_imperial", type="boolean")
     */
    private $isImperial = false;

    /**
     * @var float
     *
     * @ORM\Column(name="distance", type="float")
     */
    private $distance = 0;

    /**
     * @var float
     *
     * @ORM\Column(name="duration", type="float")
     */
    private $duration = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="sName", type="string", length=255, nullable=true)
     */
    private $sName;

    /**
     * @var string
     *
     * @ORM\Column(name="sPos", type="string", length=255, nullable=true)
     */
    private $sPos;

    /**
     * @var string
     *
     * @ORM\Column(name="tName", type="string", length=255, nullable=true)
     */
    private $tName;

    /**
     * @var string
     *
     * @ORM\Column(name="tPos", type="string", length=255, nullable=true)
     */
    private $tPos;

    /**
     * @var string
     *
     * @ORM\Column(name="sCode", type="string", length=255, nullable=true)
     */
    private $sCode;

    /**
     * @var string
     *
     * @ORM\Column(name="tCode", type="string", length=255, nullable=true)
     */
    private $tCode;


    /**
     * @var string
     *
     * @ORM\Column(name="indicativePrice", type="string", length=255, nullable=true)
     */
    private $indicativePrice;

    /**
     * @ORM\ManyToOne(targetEntity="Epic\R2RioBundle\Entity\R2SearchRoute", inversedBy="searchSegments")
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
     * @return R2SearchSegment
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
     * Set subKind
     *
     * @param string $subKind
     * @return R2SearchSegment
     */
    public function setSubKind($subKind)
    {
        $this->subKind = $subKind;

        return $this;
    }

    /**
     * Get subKind
     *
     * @return string 
     */
    public function getSubKind()
    {
        return $this->subKind;
    }

    /**
     * Set isMajor
     *
     * @param boolean $isMajor
     * @return R2SearchSegment
     */
    public function setIsMajor($isMajor)
    {
        $this->isMajor = $isMajor;

        return $this;
    }

    /**
     * Get isMajor
     *
     * @return boolean 
     */
    public function getIsMajor()
    {
        return $this->isMajor;
    }

    /**
     * Set isImperial
     *
     * @param boolean $isImperial
     * @return R2SearchSegment
     */
    public function setIsImperial($isImperial)
    {
        $this->isImperial = $isImperial;

        return $this;
    }

    /**
     * Get isImperial
     *
     * @return boolean 
     */
    public function getIsImperial()
    {
        return $this->isImperial;
    }

    /**
     * Set distance
     *
     * @param float $distance
     * @return R2SearchSegment
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
     * @return R2SearchSegment
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
     * Set sName
     *
     * @param string $sName
     * @return R2SearchSegment
     */
    public function setSName($sName)
    {
        $this->sName = $sName;

        return $this;
    }

    /**
     * Get sName
     *
     * @return string 
     */
    public function getSName()
    {
        return $this->sName;
    }

    /**
     * Set sPos
     *
     * @param string $sPos
     * @return R2SearchSegment
     */
    public function setSPos($sPos)
    {
        $this->sPos = $sPos;

        return $this;
    }

    /**
     * Get sPos
     *
     * @return string 
     */
    public function getSPos()
    {
        return $this->sPos;
    }

    /**
     * Set tName
     *
     * @param string $tName
     * @return R2SearchSegment
     */
    public function setTName($tName)
    {
        $this->tName = $tName;

        return $this;
    }

    /**
     * Get tName
     *
     * @return string 
     */
    public function getTName()
    {
        return $this->tName;
    }

    /**
     * Set tPos
     *
     * @param string $tPos
     * @return R2SearchSegment
     */
    public function setTPos($tPos)
    {
        $this->tPos = $tPos;

        return $this;
    }

    /**
     * Get tPos
     *
     * @return string 
     */
    public function getTPos()
    {
        return $this->tPos;
    }

    /**
     * Set sCode
     *
     * @param string $sCode
     * @return R2SearchSegment
     */
    public function setSCode($sCode)
    {
        $this->sCode = $sCode;

        return $this;
    }

    /**
     * Get sCode
     *
     * @return string 
     */
    public function getSCode()
    {
        return $this->sCode;
    }

    /**
     * Set tCode
     *
     * @param string $tCode
     * @return R2SearchSegment
     */
    public function setTCode($tCode)
    {
        $this->tCode = $tCode;

        return $this;
    }

    /**
     * Get tCode
     *
     * @return string 
     */
    public function getTCode()
    {
        return $this->tCode;
    }

    /**
     * Set searchRoute
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchRoute $searchRoute
     * @return R2SearchSegment
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

    /**
     * Set indicativePrice
     *
     * @param string $indicativePrice
     *
     * @return R2SearchSegment
     */
    public function setIndicativePrice($indicativePrice)
    {
        $this->indicativePrice = $indicativePrice;

        return $this;
    }

    /**
     * Get indicativePrice
     *
     * @return string
     */
    public function getIndicativePrice()
    {
        return $this->indicativePrice;
    }
}
