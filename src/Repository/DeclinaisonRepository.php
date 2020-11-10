<?php

namespace App\Repository;

use App\Entity\Declinaison;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Declinaison|null find($id, $lockMode = null, $lockVersion = null)
 * @method Declinaison|null findOneBy(array $criteria, array $orderBy = null)
 * @method Declinaison[]    findAll()
 * @method Declinaison[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeclinaisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Declinaison::class);
    }


    // /**
    //  * @return Declinaison[] Returns an array of Declinaison objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Declinaison
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
