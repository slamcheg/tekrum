<?php

namespace Application\Components\Interfaces;


/**
 * Interface RepositoryInterface
 * @package Application\Components\Interfaces
 */
interface RepositoryInterface
{
    /**
     * @param int $id
     * @return EntityInterface
     */
    public function getById(int $id);

    /**
     * @param EntityInterface $entity
     * @return bool
     */
    public function save($entity);

    /**
     * @param EntityInterface $entity
     * @return bool
     */
    public function delete($entity);
}