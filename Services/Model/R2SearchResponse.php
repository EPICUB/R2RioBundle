<?php

namespace Epic\R2RioBundle\Services\Model;

use \Epic\R2RioBundle\Entity\R2SearchResponseRepository as BaseRepository;
use \Epic\R2RioBundle\Entity\R2SearchResponse as BaseEntity;

class R2SearchResponse extends  AbstractServices{

    protected $entityName = "\Epic\R2RioBundle\Entity\R2SearchResponse";
    protected $entityShortcutName = "EpicR2RioBundle:R2SearchResponse";

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

    public function getByRequestCode($code)
    {
        return $this->getRepository()->findOneByRequestCode($code);
    }
}