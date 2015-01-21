<?php

namespace Limycuk\PribitokBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ApplicationAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $imageWebPath = '';
        $image = $this->getSubject()->getImage();

        if ($image) {
            $provider = $this->getConfigurationPool()->getContainer()->get($image->getProviderName());
            $imageWebPath = $provider->generatePublicUrl($image, 'admin');
        }
        $formMapper
            ->tab('General')
                ->with('General')
                    ->add('language', 'sonata_type_model', array('label' => 'Language'))
                    ->add('genre', 'text', array('label' => 'Genre'))
                    ->add('title', 'text', array('label' => 'Application'))
                    ->add('forMainMenu', 'checkbox', array('label' => 'For Main Page', 'required' => false))
                    ->add('description', null, array('label' => 'Description'))
                ->end()
            ->end()
            ->tab('Support')
                ->with('Support')
                    ->add('isIos', 'checkbox', array('label' => 'Support IOS', 'required' => false))
                    ->add('sizeIos', 'text', array('label' => 'size IOS', 'required' => false))
                    ->add('versionIos', 'text', array('label' => 'version IOS', 'required' => false))
                    ->add('isAndroid', 'checkbox', array('label' => 'Support Android', 'required' => false))
                    ->add('sizeAndroid', 'text', array('label' => 'size Android', 'required' => false))
                    ->add('versionAndroid', 'text', array('label' => 'version Android', 'required' => false))
                    ->add('isWinPhone', 'checkbox', array('label' => 'Support Win Phone', 'required' => false))
                    ->add('sizeWinPhone', 'text', array('label' => 'size WinPhone', 'required' => false))
                    ->add('versionWinPhone', 'text', array('label' => 'version WinPhone', 'required' => false))
                ->end()
            ->end()
            ->tab('Media')
                ->with('Media')
                    ->add('image', 'sonata_media_type', array(
                        'label'     => 'Image',
                        'required' => false,
                        'provider' => 'sonata.media.provider.image',
                        'context'  => 'default',
                        'help' => '<img src="'.$imageWebPath.'">'
                    ))
                    ->add('sliderImages', 'sonata_type_collection',
                        array(
                            'label' => 'slider list',
                            'required' => false,
                            'by_reference' => true,
                            'cascade_validation' => true
                        ),
                        array(
                            'placeholder' => 'No item selected',
                            'edit' => 'inline',
                            'inline' => 'table',
                            'sortable'  => 'position',
                            'link_parameters' => array('context' => 'default')))
                ->end()
            ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {

    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('language')
            ->add('description')
        ;
    }

    public function prePersist($object)
    {
        foreach($object->getSliderImages() as $image)
        {
            $image->setApplication($object);
        }
    }

    public function preUpdate($object)
    {
        $em = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();

        foreach($object->getSliderImages() as $image)
        {
            if(!$image->getMedia()) {
                $object->removeSliderImage($image);
                $image->setApplication(null);

                if($image->getId()) {
                    $item = $em->getRepository('LimycukPribitokBundle:GalleryHasMedia')->find($image->getId());
                    $em->remove($item);
                }
            } else {
                $image->setApplication($object);
            }
        }
    }
}