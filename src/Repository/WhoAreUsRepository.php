<?php


namespace App\Repository;

use App\Entity\WhoAreUs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WhoAreUs|null find($id, $lockMode = null, $lockVersion = null)
 * @method WhoAreUs|null findOneBy(array $criteria, array $orderBy = null)
 * @method WhoAreUs[]    findAll()
 * @method WhoAreUs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WhoAreUsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WhoAreUs::class);
    }

    // /**
    //  * @return WhoAreUs[] Returns an array of WhoAreUs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WhoAreUs
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
