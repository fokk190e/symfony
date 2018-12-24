<?php

namespace App\Repository;


use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PostRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Post::class);
    }

    /**
     * @return string
     */
    public function getAllPostsQuery(): string
    {
        $query = $this->getEntityManager()->createQuery('
            SELECT *
            FROM App\Entity\Main\Post p 
            ');

        return $query;
    }
}
