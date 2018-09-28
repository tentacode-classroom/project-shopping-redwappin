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

    public function findAll(): array
    {
        return $this->toys;
    }

    public function findOneById(int $id): Toy
    {
        foreach ($this->toys as $toy){
            if ($toy ->getId() == $id){
                return $toy;
            }
        }

        try{
            throw new NotFoundHttpException('Le produit que vous cherchez n\'existe pas');
        }catch(Exception $e){
        }

       
    }

//    /**
//     * @return Toy[] Returns an array of Toy objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

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
