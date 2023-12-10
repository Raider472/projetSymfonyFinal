<?php

namespace App\Repository;

use App\Entity\MeleeWeapon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MeleeWeapon>
 *
 * @method MeleeWeapon|null find($id, $lockMode = null, $lockVersion = null)
 * @method MeleeWeapon|null findOneBy(array $criteria, array $orderBy = null)
 * @method MeleeWeapon[]    findAll()
 * @method MeleeWeapon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeleeWeaponRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeleeWeapon::class);
    }

//    /**
//     * @return MeleeWeapon[] Returns an array of MeleeWeapon objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MeleeWeapon
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
