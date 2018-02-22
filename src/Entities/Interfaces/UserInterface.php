<?php

namespace Application\Entities\Interfaces;

use Application\Components\Interfaces\EntityInterface;

/**
 * Interface UserInterface
 * @package Application\Entities\Interfaces
 */
interface UserInterface extends EntityInterface
{
    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @return integer
     */
    public function getAge();

    /**
     * @return string
     */
    public function getBirthDate();

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName);

    /**
     * @param  string $lastName
     */
    public function setLastName($lastName);

    /**
     * @param integer $age
     */
    public function setAge($age);

    /**
     * @param integer $birthDate
     */
    public function setBirthDate($birthDate);
}