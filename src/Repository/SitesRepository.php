<?php

namespace App\Repository;

use App\Entity\Sites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sites[]    findAll()
 * @method Sites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sites::class);
    }

    public function findBySites(Sites $sites, int $user)
    {
        return $this->createQueryBuilder('s')
            ->innerjoin("s.user", "u")
            ->addSelect("u")
            ->where("s.user = :user")
            ->setParameter('user', $user)
            ->andWhere('u = :user')
            ->setParameter('sites', $sites)
            ->orderBy('s.dueDate', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function userAndSites()
    {
        return $this->createQueryBuilder('s')
        ->leftJoin('s.user','u')
        ->addSelect('u')
        ->getQuery()
        ->getResult()
        ;
    }
    /*
    public function findOneBySomeField($value): ?Sites
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
