<?php

namespace App\Repository;

use App\Entity\TotalPassTousSites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TotalPassTousSites|null find($id, $lockMode = null, $lockVersion = null)
 * @method TotalPassTousSites|null findOneBy(array $criteria, array $orderBy = null)
 * @method TotalPassTousSites[]    findAll()
 * @method TotalPassTousSites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TotalPassTousSitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TotalPassTousSites::class);
    }

    // /**
    //  * @return TotalPassTousSites[] Returns an array of TotalPassTousSites objects
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
    public function findOneBySomeField($value): ?TotalPassTousSites
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
