<?php
// src/Limycuk/PribitokBundle/Entity/Application.php

namespace Limycuk\PribitokBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="applications")
 */
class Application
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
     * @ORM\Column(type="string", length=255)
     */
    protected $genre;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $forMainMenu = false;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Media", inversedBy="applicationImages", cascade={"persist"})
     * @ORM\JoinColumn(name="mediaApplicationId", referencedColumnName="id")
     */
    protected $image;

    /**
     * @ORM\OneToMany(targetEntity="GalleryHasMedia", mappedBy="application", cascade={"persist", "remove", "merge"})
     */
    protected $sliderImages;

    /**
     * @ORM\ManyToOne(targetEntity="Language", inversedBy="applications")
     * @ORM\JoinColumn(name="languageId", referencedColumnName="id")
     */
    protected $language;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isIos = false;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $sizeIos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $versionIos;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isAndroid = false;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $sizeAndroid;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $versionAndroid;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $isWinPhone = false;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $sizeWinPhone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $versionWinPhone;

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
     * Set title
     *
     * @param string $title
     * @return Application
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
     * Set description
     *
     * @param string $description
     * @return Application
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
     * Set image
     *
     * @param \Limycuk\PribitokBundle\Entity\Media $image
     * @return Application
     */
    public function setImage(\Limycuk\PribitokBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Limycuk\PribitokBundle\Entity\Media 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set language
     *
     * @param \Limycuk\PribitokBundle\Entity\Language $language
     * @return Application
     */
    public function setLanguage(\Limycuk\PribitokBundle\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \Limycuk\PribitokBundle\Entity\Language 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    public function getPublicVersion()
    {
        $application = new \stdClass();
        $application->id = $this->getId();
        $application->title = $this->getTitle();
        $application->genre = $this->getGenre();
        $application->forMainPage = $this->getForMainMenu();
        $application->description = $this->getDescription();
        $application->isIOS = $this->getIsIos();
        $application->sizeIOS = $this->getSizeIos();
        $application->versionIOS = $this->getVersionIos();
        $application->isAndroid = $this->getIsAndroid();
        $application->sizeAndroid = $this->getSizeAndroid();
        $application->versionAndroid = $this->getVersionAndroid();
        $application->isWinPhone = $this->getIsWinPhone();
        $application->sizeWinPhone = $this->getSizeWinPhone();
        $application->versionWinPhone = $this->getVersionWinPhone();

        if ($this->getImage()) {
            $application->image = $this->getImage()->getPublicImageVersion();
        } else {
            $application->image = null;
        }

        $application->sliderImages = array();
        foreach ($this->getSliderImages() as $galleryItem)
        {
            $application->sliderImages[] = $galleryItem->getMedia()->getPublicImageVersion();
        }
        return $application;
    }

    /**
     * Set isIos
     *
     * @param boolean $isIos
     * @return Application
     */
    public function setIsIos($isIos)
    {
        $this->isIos = $isIos;

        return $this;
    }

    /**
     * Get isIos
     *
     * @return boolean 
     */
    public function getIsIos()
    {
        return $this->isIos;
    }

    /**
     * Set isAndroid
     *
     * @param boolean $isAndroid
     * @return Application
     */
    public function setIsAndroid($isAndroid)
    {
        $this->isAndroid = $isAndroid;

        return $this;
    }

    /**
     * Get isAndroid
     *
     * @return boolean 
     */
    public function getIsAndroid()
    {
        return $this->isAndroid;
    }

    /**
     * Set isWinPhone
     *
     * @param boolean $isWinPhone
     * @return Application
     */
    public function setIsWinPhone($isWinPhone)
    {
        $this->isWinPhone = $isWinPhone;

        return $this;
    }

    /**
     * Get isWinPhone
     *
     * @return boolean 
     */
    public function getIsWinPhone()
    {
        return $this->isWinPhone;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sliderImages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sliderImages
     *
     * @param \Limycuk\PribitokBundle\Entity\GalleryHasMedia $sliderImages
     * @return Application
     */
    public function addSliderImage(\Limycuk\PribitokBundle\Entity\GalleryHasMedia $sliderImages)
    {
        $this->sliderImages[] = $sliderImages;

        return $this;
    }

    /**
     * Remove sliderImages
     *
     * @param \Limycuk\PribitokBundle\Entity\GalleryHasMedia $sliderImages
     */
    public function removeSliderImage(\Limycuk\PribitokBundle\Entity\GalleryHasMedia $sliderImages)
    {
        $this->sliderImages->removeElement($sliderImages);
    }

    /**
     * Get sliderImages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSliderImages()
    {
        return $this->sliderImages;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return Application
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set sizeIos
     *
     * @param string $sizeIos
     * @return Application
     */
    public function setSizeIos($sizeIos)
    {
        $this->sizeIos = $sizeIos;

        return $this;
    }

    /**
     * Get sizeIos
     *
     * @return string 
     */
    public function getSizeIos()
    {
        return $this->sizeIos;
    }

    /**
     * Set versionIos
     *
     * @param string $versionIos
     * @return Application
     */
    public function setVersionIos($versionIos)
    {
        $this->versionIos = $versionIos;

        return $this;
    }

    /**
     * Get versionIos
     *
     * @return string 
     */
    public function getVersionIos()
    {
        return $this->versionIos;
    }

    /**
     * Set sizeAndroid
     *
     * @param string $sizeAndroid
     * @return Application
     */
    public function setSizeAndroid($sizeAndroid)
    {
        $this->sizeAndroid = $sizeAndroid;

        return $this;
    }

    /**
     * Get sizeAndroid
     *
     * @return string 
     */
    public function getSizeAndroid()
    {
        return $this->sizeAndroid;
    }

    /**
     * Set versionAndroid
     *
     * @param string $versionAndroid
     * @return Application
     */
    public function setVersionAndroid($versionAndroid)
    {
        $this->versionAndroid = $versionAndroid;

        return $this;
    }

    /**
     * Get versionAndroid
     *
     * @return string 
     */
    public function getVersionAndroid()
    {
        return $this->versionAndroid;
    }

    /**
     * Set sizeWinPhone
     *
     * @param string $sizeWinPhone
     * @return Application
     */
    public function setSizeWinPhone($sizeWinPhone)
    {
        $this->sizeWinPhone = $sizeWinPhone;

        return $this;
    }

    /**
     * Get sizeWinPhone
     *
     * @return string 
     */
    public function getSizeWinPhone()
    {
        return $this->sizeWinPhone;
    }

    /**
     * Set versionWinPhone
     *
     * @param string $versionWinPhone
     * @return Application
     */
    public function setVersionWinPhone($versionWinPhone)
    {
        $this->versionWinPhone = $versionWinPhone;

        return $this;
    }

    /**
     * Get versionWinPhone
     *
     * @return string 
     */
    public function getVersionWinPhone()
    {
        return $this->versionWinPhone;
    }

    /**
     * Set forMainMenu
     *
     * @param boolean $forMainMenu
     * @return Application
     */
    public function setForMainMenu($forMainMenu)
    {
        $this->forMainMenu = $forMainMenu;

        return $this;
    }

    /**
     * Get forMainMenu
     *
     * @return boolean 
     */
    public function getForMainMenu()
    {
        return $this->forMainMenu;
    }
}
