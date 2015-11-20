<?php

namespace Epic\R2RioBundle\Services\Model;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityRepository;

class EntitiesRepository
{
    private $doctrine;

    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @param        $entity
     * @param string $persistentManagerName
     *
     * @return EntityRepository
     */
    public function getRepository($entity, $persistentManagerName = 'default')
    {
        $repository = $this->doctrine->getManager($persistentManagerName)->getRepository($entity);

        return $repository;
    }
} 