<?php
// src/Limycuk/PribitokBundle/EventListener/EntityLoader.php

namespace Limycuk\PribitokBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Symfony\Component\DependencyInjection\Container;
use Limycuk\PribitokBundle\Entity\Media;

class EntityLoader
{
	protected $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}

    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        $entityManager = $args->getEntityManager();

        if ($entity instanceof Media) {
           $entity->setContainer($this->container);
        }
    }
}