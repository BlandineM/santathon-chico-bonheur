<?php

namespace App\Repository;

use App\Entity\ScoreCit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ScoreCit|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScoreCit|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScoreCit[]    findAll()
 * @method ScoreCit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoreCitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScoreCit::class);
    }

    // /**
    //  * @return ScoreCit[] Returns an array of ScoreCit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ScoreCit
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
