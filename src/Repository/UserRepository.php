<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @param integer $role
     * @return array
     */
    public function getUserToRole($role)
    {
        $query = $this->getEntityManager()->createQuery(
            'SELECT u
        FROM App\Entity\User u
        WHERE u.role = :role'
        )->setParameter('role', $role);

        return $query->execute();
    }
}
