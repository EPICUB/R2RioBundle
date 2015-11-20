<?php

namespace Epic\R2RioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * R2SearchRequest
 *
 * @ORM\Table(name="r2_search_request", indexes={@ORM\Index(name="r2_search_request_code_index", columns={"code"})})
 * @ORM\Entity(repositoryClass="Epic\R2RioBundle\Entity\R2SearchRequestRepository")
 */
class R2SearchRequest
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
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="oName", type="string", length=255, nullable=true)
     */
    private $oName;

    /**
     * @var string
     *
     * @ORM\Column(name="dName", type="string", length=255, nullable=true)
     */
    private $dName;

    /**
     * @ORM\OneToOne(targetEntity="Epic\R2RioBundle\Entity\R2SearchResponse", mappedBy="searchRequest")
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
     * @return R2SearchRequest
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
     * Set oName
     *
     * @param string $oName
     * @return R2SearchRequest
     */
    public function setOName($oName)
    {
        $this->oName = $oName;

        return $this;
    }

    /**
     * Get oName
     *
     * @return string 
     */
    public function getOName()
    {
        return $this->oName;
    }

    /**
     * Set dName
     *
     * @param string $dName
     * @return R2SearchRequest
     */
    public function setDName($dName)
    {
        $this->dName = $dName;

        return $this;
    }

    /**
     * Get dName
     *
     * @return string 
     */
    public function getDName()
    {
        return $this->dName;
    }

    /**
     * Set searchResponse
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchResponse $searchResponse
     * @return R2SearchRequest
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
