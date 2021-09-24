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
    

    /**
    * Recherche les mots clés sur la page Swot
    * @return void
    */
    public function search($mots = null)
    {
    $query = $this->createQueryBuilder('a');
    $query->andWhere('a.active = 1');
    if ($mots != null){
        $query->andWhere('MATCH_AGAINST(a.forces, a.faiblesses, a.opportunites, a.menaces) AGAINST(:mots boolean)>0')
        ->setParameter('mots', $mots);
    }
    return $query->getQuery()->getResult();
    }

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

    public function test() {
          $query = $this->_em->createQuery('SELECT * FROM swot);
        $resultats = $query->getResult();
            return $resultats;
    }
    */
}
