<?php

namespace App\Repository;

use App\Entity\©©©;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ©©©|null find($id, $lockMode = null, $lockVersion = null)
 * @method ©©©|null findOneBy(array $criteria, array $orderBy = null)
 * @method ©©©[]    findAll()
 * @method ©©©[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ©©©Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ©©©::class);
    }

    // /**
    //  * @return ©©©[] Returns an array of ©©© objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('�')
            ->andWhere('�.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('�.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?©©©
    {
        return $this->createQueryBuilder('�')
            ->andWhere('�.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
