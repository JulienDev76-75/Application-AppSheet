<?php

namespace App\Repository;

use App\Entity\Swot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Swot|null find($id, $lockMode = null, $lockVersion = null)
 * @method Swot|null findOneBy(array $criteria, array $orderBy = null)
 * @method Swot[]    findAll()
 * @method Swot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SwotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Swot::class);
    }

    // /**
    //  * @return Swot[] Returns an array of Swot objects
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
    public function findOneBySomeField($value): ?Swot
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
