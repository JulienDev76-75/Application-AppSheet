<?php

namespace App\Repository;

use App\Entity\Total;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Total|null find($id, $lockMode = null, $lockVersion = null)
 * @method Total|null findOneBy(array $criteria, array $orderBy = null)
 * @method Total[]    findAll()
 * @method Total[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TotalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Total::class);
    }

    public function trimestreASC()
    {
        return $this->createQueryBuilder('t')
        ->orderBy("t.trimestre", "ASC")
        ->getQuery()
        ->getResult()
        ;
    }
    // /**
    //  * @return Total[] Returns an array of Total objects
    //  */
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
    public function findOneBySomeField($value): ?Total
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
