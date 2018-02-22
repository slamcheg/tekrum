<?php

namespace Application\Repository;

use Application\Components\Connection;
use Application\Components\Interfaces\EntityInterface;
use Application\Components\Interfaces\RepositoryInterface;
use Application\Components\QueryBuilder;
use Application\Entities\Interfaces\UserInterface;
use Application\Entities\User;

class UserRepository implements RepositoryInterface
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getById(int $id)
    {
        $row = (new QueryBuilder())
            ->select(['user.*'])
            ->from('user')
            ->build()
            ->execute($this->connection->db);
        if(!empty($row)){
            $user = new User();
            $user->setId($row[0]['id']);
            $user->setFirstName($row[0]['first_name']);
            $user->setLastName($row[0]['last_name']);
            $user->setAge($row[0]['age']);
            $user->setBirthDate($row[0]['birth_date']);
            return $user;
        }
        throw new \Exception('User not found');
    }

    /**
     * @param UserInterface $entity
     * @return bool
     */
    public function save($entity)
    {
        return (new QueryBuilder())
            ->bindParam(':fname', $entity->getFirstName(), \PDO::PARAM_STR)
            ->bindParam(':lname', $entity->getLastName(), \PDO::PARAM_STR)
            ->bindParam(':age', $entity->getAge(), \PDO::PARAM_INT)
            ->bindParam(':bdate', $entity->getBirthDate(), \PDO::PARAM_STR)
            ->executeCommand("INSERT INTO `user` (first_name,last_name,age,birth_date) VALUES (:fname,:lname,:age,:bdate)", $this->connection->db);
    }

    /**
     * @param EntityInterface $entity
     * @return bool
     */
    public function delete($entity)
    {
        return (new QueryBuilder())
            ->bindParam(':id', $entity->getId(), \PDO::PARAM_INT)
            ->executeCommand("DELETE FROM user WHERE id = :id", $this->connection->db);
    }
}