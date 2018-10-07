<?php

namespace App\Repository;

use App\Entity\Toy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Toy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Toy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Toy[]    findAll()
 * @method Toy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ToyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Toy::class);
    }

    public function findAllToy()
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.price > :price')
            ->setParameter('price', 12)
            ->orderBy('t.price', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Toy
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
