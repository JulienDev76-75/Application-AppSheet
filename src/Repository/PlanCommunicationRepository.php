<?php

namespace App\Repository;

use App\Entity\PlanCommunication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlanCommunication|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanCommunication|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanCommunication[]    findAll()
 * @method PlanCommunication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanCommunicationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanCommunication::class);
    }

    public function sitesAndCoutCom()
    {
        return $this->createQueryBuilder('p')
        ->leftJoin('p.site','s')
        ->addSelect('s')
        ->getQuery()
        ->getResult()
        ;
    }

    public function coutParObjectif()
    {
        return $this->createQueryBuilder('p')
        ->addSelect('s')
        ->getQuery()
        ->getResult()
        ;
    }

    //public function ObjectifConquete($conquete)
    //{
        
    //   return $this->createQueryBuilder('p')
    //    ->andWhere('p.objectif = :Conquete')
    //    ->setParameter('Conquete', $conquete)
    //    ->getQuery()
    //    ->getResult()
    //   ;
    //}

    //public function ObjectifFideConq($fideconquete)
    //{
        
    //   return $this->createQueryBuilder('p')
    //    ->andWhere('p.objectif = :Fidelisation-Conquete')
    //    ->setParameter('Fidelisation-Conquete', $fideconquete)
    //   ->getQuery()
    //   ->getResult()
    //    ;
    //}

    
    // /**
    //  * @return PlanCommunication[] Returns an array of PlanCommunication objects
    //  */
    /*
    public function findByExampleField($animation)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.type_operation = :Animation')
            ->setParameter('Animation', $animation)
            ->orderBy('annee', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlanCommunication
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
