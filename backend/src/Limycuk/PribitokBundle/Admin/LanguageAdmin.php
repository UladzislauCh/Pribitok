<?php

namespace Limycuk\PribitokBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LanguageAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $jsonWebPath = '';
        $json = $this->getSubject()->getJson();

        if ($json) {
            $provider = $this->getConfigurationPool()->getContainer()->get($json->getProviderName());
            $jsonWebPath = $provider->generatePublicUrl($json, 'admin');
        }
        $formMapper
            ->add('title', 'text', array('label' => 'Language'))
            ->add('json', 'sonata_media_type', array(
                'label'     => 'Json',
                'required' => false,
                'provider' => 'sonata.media.provider.file',
                'context'  => 'default',
                'help' => '<img src="'.$jsonWebPath.'">'
            ))
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
            ->add('json')
        ;
    }
}