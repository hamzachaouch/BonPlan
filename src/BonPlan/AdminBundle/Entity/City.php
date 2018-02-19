<?php

namespace BonPlan\AdminBundle\Entity;

/**
 * City
 */
class City
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $linkYoutube;

    /**
     * @var string
     */
    private $linkFb;

    /**
     * @var string
     */
    private $linkInsta;

    /**
     * @var string
     */
    private $imgUrl;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return City
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
     * Set description
     *
     * @param string $description
     *
     * @return City
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
     * Set linkYoutube
     *
     * @param string $linkYoutube
     *
     * @return City
     */
    public function setLinkYoutube($linkYoutube)
    {
        $this->linkYoutube = $linkYoutube;

        return $this;
    }

    /**
     * Get linkYoutube
     *
     * @return string
     */
    public function getLinkYoutube()
    {
        return $this->linkYoutube;
    }

    /**
     * Set linkFb
     *
     * @param string $linkFb
     *
     * @return City
     */
    public function setLinkFb($linkFb)
    {
        $this->linkFb = $linkFb;

        return $this;
    }

    /**
     * Get linkFb
     *
     * @return string
     */
    public function getLinkFb()
    {
        return $this->linkFb;
    }

    /**
     * Set linkInsta
     *
     * @param string $linkInsta
     *
     * @return City
     */
    public function setLinkInsta($linkInsta)
    {
        $this->linkInsta = $linkInsta;

        return $this;
    }

    /**
     * Get linkInsta
     *
     * @return string
     */
    public function getLinkInsta()
    {
        return $this->linkInsta;
    }

    /**
     * Set imgUrl
     *
     * @param string $imgUrl
     *
     * @return City
     */
    public function setImgUrl($imgUrl)
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    /**
     * Get imgUrl
     *
     * @return string
     */
    public function getImgUrl()
    {
        return $this->imgUrl;
    }
}
