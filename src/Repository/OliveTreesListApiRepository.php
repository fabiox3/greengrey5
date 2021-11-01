<?php

namespace App\Repository;

use App\Entity\OliveTreesListApi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OliveTreesListApi|null find($id, $lockMode = null, $lockVersion = null)
 * @method OliveTreesListApi|null findOneBy(array $criteria, array $orderBy = null)
 * @method OliveTreesListApi[]    findAll()
 * @method OliveTreesListApi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OliveTreesListApiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OliveTreesListApi::class);
    }

    // /**
    //  * @return OliveTreesListApi[] Returns an array of OliveTreesListApi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OliveTreesListApi
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
