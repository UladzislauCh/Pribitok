<?php
// src/Limycuk/PribitokBundle/Entity/Gallery.php

namespace Limycuk\PribitokBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\MediaBundle\Entity\BaseGallery;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="gallery")
 * @ORM\HasLifecycleCallbacks()
 */
class Gallery extends BaseGallery {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="GalleryHasMedia", mappedBy="gallery", cascade={"persist", "remove"})
     */
    protected $galleryHasMedias;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->galleryHasMedias = new ArrayCollection();
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
     * Add galleryHasMedias
     *
     * @param \Limycuk\PribitokBundle\Entity\GalleryHasMedia $galleryHasMedias
     * @return Gallery
     */
    public function addGalleryHasMedia(\Limycuk\PribitokBundle\Entity\GalleryHasMedia $galleryHasMedias)
    {
        $this->galleryHasMedias[] = $galleryHasMedias;

        return $this;
    }

    /**
     * Remove galleryHasMedias
     *
     * @param \Limycuk\PribitokBundle\Entity\GalleryHasMedia $galleryHasMedias
     */
    public function removeGalleryHasMedia(\Limycuk\PribitokBundle\Entity\GalleryHasMedia $galleryHasMedias)
    {
        $this->galleryHasMedias->removeElement($galleryHasMedias);
    }

    /**
     * Get galleryHasMedias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGalleryHasMedias()
    {
        return $this->galleryHasMedias;
    }
}
