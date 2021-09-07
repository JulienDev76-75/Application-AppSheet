<?php

namespace App\Repository;

use App\Entity\Rig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Rig|null find($id, $lockMode = null, $lockVersion = null)
 * @method Rig|null findOneBy(array $criteria, array $orderBy = null)
 * @method Rig[]    findAll()
 * @method Rig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Rig::class);
    }

    // /**
    //  * @return Rig[] Returns an array of Rig objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Rig
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
