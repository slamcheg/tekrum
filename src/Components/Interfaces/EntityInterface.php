<?php


namespace Application\Components\Interfaces;


/**
 * Interface EntityInterface
 * @package Application\Components\Interfaces
 */
interface EntityInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @param int $id
     */
    public function setId($id);
}