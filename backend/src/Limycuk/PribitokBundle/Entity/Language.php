<?php
// src/Limycuk/PribitokBundle/Entity/Language.php

namespace Limycuk\PribitokBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="languages")
 */
class Language
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $title;

    /**
     * @ORM\ManyToOne(targetEntity="Media", inversedBy="languageJson", cascade={"persist"})
     * @ORM\JoinColumn(name="mediaId", referencedColumnName="id")
     */
    protected $json;

    /**
     * Get id
     *
     * @return integer 
     */
    public function g0etId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Language
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set json
     *
     * @param \Limycuk\PribitokBundle\Entity\Media $json
     * @return Language
     */
    public function setJson(\Limycuk\PribitokBundle\Entity\Media $json = null)
    {
        $this->json = $json;

        return $this;
    }

    /**
     * Get json
     *
     * @return \Limycuk\PribitokBundle\Entity\Media 
     */
    public function getJson()
    {
        return $this->json;
    }
}
