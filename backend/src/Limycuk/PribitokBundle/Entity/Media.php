<?php
// src/Limycuk/PribitokBundle/Entity/Media.php

namespace Limycuk\PribitokBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\MediaBundle\Entity\BaseMedia;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\DependencyInjection\Container;

/**
 * @ORM\Entity
 * @ORM\Table(name="media")
 * @ORM\HasLifecycleCallbacks()
 */
class Media extends BaseMedia {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="GalleryHasMedia", mappedBy="media", cascade={"persist", "remove"})
     */
    protected $galleryHasMedias;

    protected $container;

    /**
     * @ORM\OneToMany(targetEntity="Language", mappedBy="json", cascade={"persist", "remove"})
     */
    protected $languageJson;

    /**
     * @ORM\OneToMany(targetEntity="Application", mappedBy="image", cascade={"persist", "remove"})
     */
    protected $applicationImages;

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
     * @return Media
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

    public function setContainer(Container $container)
    {
        $this->container = $container;
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function getMediaPublicUrl($format)
    {
        $provider = $this->container->get($this->getProviderName());

        $format = $provider->getFormatName($this, $format);

        return $provider->generatePublicUrl($this, $format);
    }

    public function getPublicImageVersion()
    {
        $image = new \stdClass();

        $image->realUri = $this->getMediaPublicUrl('reference');

        return $image;
    }

    /**
     * Add languageJson
     *
     * @param \Limycuk\PribitokBundle\Entity\Language $languageJson
     * @return Media
     */
    public function addLanguageJson(\Limycuk\PribitokBundle\Entity\Language $languageJson)
    {
        $this->languageJson[] = $languageJson;

        return $this;
    }

    /**
     * Remove languageJson
     *
     * @param \Limycuk\PribitokBundle\Entity\Language $languageJson
     */
    public function removeLanguageJson(\Limycuk\PribitokBundle\Entity\Language $languageJson)
    {
        $this->languageJson->removeElement($languageJson);
    }

    /**
     * Get languageJson
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLanguageJson()
    {
        return $this->languageJson;
    }

    /**
     * Add applicationImages
     *
     * @param \Limycuk\PribitokBundle\Entity\Application $applicationImages
     * @return Media
     */
    public function addApplicationImage(\Limycuk\PribitokBundle\Entity\Application $applicationImages)
    {
        $this->applicationImages[] = $applicationImages;

        return $this;
    }

    /**
     * Remove applicationImages
     *
     * @param \Limycuk\PribitokBundle\Entity\Application $applicationImages
     */
    public function removeApplicationImage(\Limycuk\PribitokBundle\Entity\Application $applicationImages)
    {
        $this->applicationImages->removeElement($applicationImages);
    }

    /**
     * Get applicationImages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getApplicationImages()
    {
        return $this->applicationImages;
    }
}
