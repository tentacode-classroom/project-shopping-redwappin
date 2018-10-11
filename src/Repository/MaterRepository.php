<?php

namespace App\Repository;

use App\Entity\Mater;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Mater|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mater|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mater[]    findAll()
 * @method Mater[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaterRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Mater::class);
    }

//    /**
//     * @return Mater[] Returns an array of Mater objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Mater
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
