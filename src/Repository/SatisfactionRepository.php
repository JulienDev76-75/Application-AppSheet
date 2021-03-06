<?php

namespace App\Repository;

use App\Entity\Satisfaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Satisfaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Satisfaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Satisfaction[]    findAll()
 * @method Satisfaction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SatisfactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Satisfaction::class);
    }

    public function sitesAndSatis()
    {
        return $this->createQueryBuilder('s')
        ->leftJoin('s.site','ss')
        ->addSelect('ss')
        ->getQuery()
        ->getResult()
        ;
    }

    // /**
    //  * @return Satisfaction[] Returns an array of Satisfaction objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Satisfaction
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
