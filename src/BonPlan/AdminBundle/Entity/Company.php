<?php

namespace BonPlan\AdminBundle\Entity;

/**
 * Company
 */
class Company
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $id_City;

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
    private $address;

    /**
     * @var string
     */
    private $type;

    /**
     * @var bool
     */
    private $prenium;

    /**
     * @var string
     */
    private $imgUrl;

    /**
     * @var string
     */
    private $email;

    /**
     * @return int
     */
    public function getIdCity()
    {
        return $this->id_City;
    }

    /**
     * @param int $id_City
     */
    public function setIdCity($id_City)
    {
        $this->id_City = $id_City;
    }


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
     * @return Company
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
     * @return Company
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
     * Set address
     *
     * @param string $address
     *
     * @return Company
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Company
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set prenium
     *
     * @param boolean $prenium
     *
     * @return Company
     */
    public function setPrenium($prenium)
    {
        $this->prenium = $prenium;

        return $this;
    }

    /**
     * Get prenium
     *
     * @return bool
     */
    public function getPrenium()
    {
        return $this->prenium;
    }

    /**
     * Set imgUrl
     *
     * @param string $imgUrl
     *
     * @return Company
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

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Company
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
}
