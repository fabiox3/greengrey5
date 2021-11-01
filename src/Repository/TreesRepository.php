<?php

namespace App\Repository;

use App\Entity\Trees;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Trees|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trees|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trees[]    findAll()
 * @method Trees[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TreesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trees::class);
    }

    // /**
    //  * @return Trees[] Returns an array of Trees objects
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
    public function findOneBySomeField($value): ?Trees
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
