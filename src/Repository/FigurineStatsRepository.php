<?php

namespace App\Repository;

use App\Entity\FigurineStats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FigurineStats>
 *
 * @method FigurineStats|null find($id, $lockMode = null, $lockVersion = null)
 * @method FigurineStats|null findOneBy(array $criteria, array $orderBy = null)
 * @method FigurineStats[]    findAll()
 * @method FigurineStats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FigurineStatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FigurineStats::class);
    }

//    /**
//     * @return FigurineStats[] Returns an array of FigurineStats objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?FigurineStats
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
