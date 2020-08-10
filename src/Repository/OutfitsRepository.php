<?php


namespace App\Repository;

use App\Entity\Outfits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Outfits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Outfits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Outfits[]    findAll()
 * @method Outfits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OutfitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Outfits::class);
    }

    // /**
    //  * @return Outfits[] Returns an array of Outfits objects
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
    public function findOneBySomeField($value): ?Outfits
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
