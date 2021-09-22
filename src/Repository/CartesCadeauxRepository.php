<?php

namespace App\Repository;

use App\Entity\CartesCadeaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CartesCadeaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method CartesCadeaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method CartesCadeaux[]    findAll()
 * @method CartesCadeaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CartesCadeauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CartesCadeaux::class);
    }


    // /**
    //  * @return CartesCadeaux[] Returns an array of CartesCadeaux objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CartesCadeaux
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
