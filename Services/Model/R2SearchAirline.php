<?php

namespace Epic\R2RioBundle\Services\Model;

use \Epic\R2RioBundle\Entity\R2SearchAirlineRepository as BaseRepository;
use \Epic\R2RioBundle\Entity\R2SearchAirline as BaseEntity;

class R2SearchAirline extends  AbstractServices{

    protected $entityName = "\Epic\R2RioBundle\Entity\R2SearchAirline";
    protected $entityShortcutName = "EpicR2RioBundle:R2SearchAirline";

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

    public function getDatableElement($response, $start = 0, $limit = 10, $order = array(), $filter = '')
    {
        return $this->getRepository()->datableElement($response, $start, $limit, $order, $filter);
    }

    public function getTotalElement($response)
    {
        return $this->getRepository()->getCountTotal($response);
    }

    public function getTotalFilter($response, $filter = '')
    {
        return $this->getRepository()->getFilterTotal($response, $filter);
    }
}