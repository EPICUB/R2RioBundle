<?php

namespace Epic\R2RioBundle\Services\Model;

use \Epic\R2RioBundle\Entity\R2SearchStopRepository as BaseRepository;
use \Epic\R2RioBundle\Entity\R2SearchStop as BaseEntity;

class R2SearchStop extends  AbstractServices{

    protected $entityName = "\Epic\R2RioBundle\Entity\R2SearchStop";
    protected $entityShortcutName = "EpicR2RioBundle:R2SearchStop";

    /**
     * @return BaseRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @param null|integer id
     * @return BaseEntity
     */
    public function getEntity($id = null)
    {
        if(null === $id) {
            return new $this->entityName();
        }
        return $this->getRepository()->find($id);
    }

    public function update(BaseEntity $entity)
    {
        $this->getRepository()->update($entity);
    }

    public function remove(BaseEntity $entity)
    {
        $this->getRepository()->remove($entity);
    }

    public function getDatableElement($route, $start = 0, $limit = 10, $order = array(), $filter = '')
    {
        return $this->getRepository()->datableElement($route, $start, $limit, $order, $filter);
    }

    public function getTotalElement($route)
    {
        return $this->getRepository()->getCountTotal($route);
    }

    public function getTotalFilter($route, $filter = '')
    {
        return $this->getRepository()->getFilterTotal($route, $filter);
    }
}