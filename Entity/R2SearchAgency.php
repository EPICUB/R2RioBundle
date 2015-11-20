<?php

namespace Epic\R2RioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * R2SearchAgency
 *
 * @ORM\Table(name="r2_search_agency")
 * @ORM\Entity(repositoryClass="Epic\R2RioBundle\Entity\R2SearchAgencyRepository")
 */
class R2SearchAgency
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="icon_path", type="string", length=255, nullable=true)
     */
    private $iconPath;

    /**
     * @var string
     *
     * @ORM\Column(name="icon_size", type="string", length=255, nullable=true)
     */
    private $iconSize;

    /**
     * @var string
     *
     * @ORM\Column(name="icon_offset", type="string", length=255, nullable=true)
     */
    private $iconOffset;

    /**
     * @ORM\ManyToOne(targetEntity="Epic\R2RioBundle\Entity\R2SearchResponse", inversedBy="searchAgencies")
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
     * @return R2SearchAgency
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
     * Set name
     *
     * @param string $name
     * @return R2SearchAgency
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
     * Set url
     *
     * @param string $url
     * @return R2SearchAgency
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set iconPath
     *
     * @param string $iconPath
     * @return R2SearchAgency
     */
    public function setIconPath($iconPath)
    {
        $this->iconPath = $iconPath;

        return $this;
    }

    /**
     * Get iconPath
     *
     * @return string 
     */
    public function getIconPath()
    {
        return $this->iconPath;
    }

    /**
     * Set iconSize
     *
     * @param string $iconSize
     * @return R2SearchAgency
     */
    public function setIconSize($iconSize)
    {
        $this->iconSize = $iconSize;

        return $this;
    }

    /**
     * Get iconSize
     *
     * @return string 
     */
    public function getIconSize()
    {
        return $this->iconSize;
    }

    /**
     * Set iconOffset
     *
     * @param string $iconOffset
     * @return R2SearchAgency
     */
    public function setIconOffset($iconOffset)
    {
        $this->iconOffset = $iconOffset;

        return $this;
    }

    /**
     * Get iconOffset
     *
     * @return string 
     */
    public function getIconOffset()
    {
        return $this->iconOffset;
    }

    /**
     * Set searchResponse
     *
     * @param \Epic\R2RioBundle\Entity\R2SearchResponse $searchResponse
     * @return R2SearchAgency
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
