<?php

namespace App\Repository;

use App\Entity\Oliveto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Oliveto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Oliveto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Oliveto[]    findAll()
 * @method Oliveto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OlivetoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Oliveto::class);
    }

    // /**
    //  * @return Oliveto[] Returns an array of Oliveto objects
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
    public function findOneBySomeField($value): ?Oliveto
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
