<?php
// src/Limycuk/PribitokBundle/Entity/GalleryHasMedia.php

namespace Limycuk\PribitokBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\MediaBundle\Entity\BaseGalleryHasMedia;

/**
 * @ORM\Entity
 * @ORM\Table(name="gallery_has_media")
 * @ORM\HasLifecycleCallbacks()
 */
class GalleryHasMedia extends BaseGalleryHasMedia {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Gallery", inversedBy="galleryHasMedias", cascade={"persist"})
     * @ORM\JoinColumn(name="galleryId", referencedColumnName="id", nullable=true)
     **/
    protected $gallery;

    /**
     * @ORM\ManyToOne(targetEntity="Media", inversedBy="galleryHasMedias", cascade={"persist"})
     * @ORM\JoinColumn(name="mediaId", referencedColumnName="id", nullable=true)
     **/
    protected $media;

    /**
     * @ORM\ManyToOne(targetEntity="Application", inversedBy="sliderImages", cascade={"persist"})
     * @ORM\JoinColumn(name="applicationId", referencedColumnName="id", nullable=true)
     **/
    protected $application;

    public function setGallery(\Sonata\MediaBundle\Model\GalleryInterface $gallery = null)
    {
        $this->gallery = $gallery;

        return $this;
    }

    public function setMedia(\Sonata\MediaBundle\Model\MediaInterface $media = null)
    {
        $this->media = $media;

        return $this;
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
     * Get gallery
     *
     * @return \Limycuk\PribitokBundle\Entity\Gallery
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Get media
     *
     * @return \Limycuk\PribitokBundle\Entity\Media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set application
     *
     * @param \Limycuk\PribitokBundle\Entity\Application $application
     * @return GalleryHasMedia
     */
    public function setApplication(\Limycuk\PribitokBundle\Entity\Application $application = null)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return \Limycuk\PribitokBundle\Entity\Application 
     */
    public function getApplication()
    {
        return $this->application;
    }
}
