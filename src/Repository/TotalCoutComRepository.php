<?php

namespace App\Repository;

use App\Entity\TotalCoutCom;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TotalCoutCom|null find($id, $lockMode = null, $lockVersion = null)
 * @method TotalCoutCom|null findOneBy(array $criteria, array $orderBy = null)
 * @method TotalCoutCom[]    findAll()
 * @method TotalCoutCom[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TotalCoutComRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TotalCoutCom::class);
    }



    // /**
    //  * @return TotalCoutCom[] Returns an array of TotalCoutCom objects
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
    public function findOneBySomeField($value): ?TotalCoutCom
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
