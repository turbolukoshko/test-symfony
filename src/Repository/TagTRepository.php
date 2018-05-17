<?php

namespace App\Repository;

use App\Entity\TagT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TagT|null find($id, $lockMode = null, $lockVersion = null)
 * @method TagT|null findOneBy(array $criteria, array $orderBy = null)
 * @method TagT[]    findAll()
 * @method TagT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagTRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TagT::class);
    }

//    /**
//     * @return TagT[] Returns an array of TagT objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TagT
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
