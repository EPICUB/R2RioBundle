<?php

namespace Epic\R2RioBundle\Services\Model;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Epic\R2RioBundle\Interfaces\BaseServicesInterface;

abstract class AbstractServices implements BaseServicesInterface
{
    protected $doctrine;
    protected $repository;
    protected $entityName;
    protected $entityShortcutName;

    public function __construct(Registry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->repository = $this->doctrine->getRepository($this->getEntityShortcutName());
    }

    /**
     * @return string
     */
    public function getEntityName()
    {
        return $this->entityName;
    }

    /**
     * @return string
     */
    public function getEntityShortcutName()
    {
        return $this->entityShortcutName;
    }
}