<?php

namespace App\Repository;

use App\Entity\ASavoir;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ASavoir|null find($id, $lockMode = null, $lockVersion = null)
 * @method ASavoir|null findOneBy(array $criteria, array $orderBy = null)
 * @method ASavoir[]    findAll()
 * @method ASavoir[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ASavoirRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ASavoir::class);
    }

    // /**
    //  * @return ASavoir[] Returns an array of ASavoir objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ASavoir
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
