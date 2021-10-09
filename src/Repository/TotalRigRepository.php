<?php

namespace App\Repository;

use App\Entity\TotalRig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TotalRig|null find($id, $lockMode = null, $lockVersion = null)
 * @method TotalRig|null findOneBy(array $criteria, array $orderBy = null)
 * @method TotalRig[]    findAll()
 * @method TotalRig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TotalRigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TotalRig::class);
    }

    public function panierMoyenTotal()
    {
        return $this->createQueryBuilder('t')
        ->select('AVG(t.panier_moyen) as paniermoyen')
        ->where('t.annee = 2020 ')
        ->getQuery()
        ->getResult()
        ;
    }

    public function caTotalAvg()
    {
        return $this->createQueryBuilder('t')
        ->select('AVG(t.chiffre_affaire) as chiffreaffaire')
        ->where('t.annee = 2019')
        ->getQuery()
        ->getResult()
        ;
    }

    public function caTotalSum()
    {
        return $this->createQueryBuilder('t')
        ->select('SUM(t.chiffre_affaire) as chiffreaffaire')
        ->where('t.annee = 2019')
        ->getQuery()
        ->getResult()
        ;
    }

    public function freqTotal()
    {
        return $this->createQueryBuilder('t')
        ->select('AVG(t.chiffre_affaire) as chiffreaffaire')
        ->where('t.annee = 2019')
        ->getQuery()
        ->getResult()
        ;
    }
    // /**
    //  * @return TotalRig[] Returns an array of TotalRig objects
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
    public function findOneBySomeField($value): ?TotalRig
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
