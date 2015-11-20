<?php

namespace Epic\R2RioBundle\Services\Model;

use \Epic\R2RioBundle\Entity\R2SearchRequestRepository as BaseRepository;
use \Epic\R2RioBundle\Entity\R2SearchRequest as BaseEntity;

class R2SearchRequest extends  AbstractServices{

    protected $entityName = "\Epic\R2RioBundle\Entity\R2SearchRequest";
    protected $entityShortcutName = "EpicR2RioBundle:R2SearchRequest";

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

    /**
     * @param string code
     * @return BaseEntity
     */
    public function getRequestByCode($code)
    {
        return $this->getRepository()->findOneBy(array('code'=>$code));
    }

    public function getDatableElement($start = 0, $limit = 10, $order = array(), $filter = '')
    {
        return $this->getRepository()->datableElement($start, $limit, $order, $filter);
    }

    public function getTotalElement()
    {
        return $this->getRepository()->getCountTotal();
    }

    public function getTotalFilter($filter = '')
    {
        return $this->getRepository()->getFilterTotal($filter);
    }
}