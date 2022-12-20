<?php

namespace App\Repository;

use App\Entity\SectionExternalSite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SectionExternalSite>
 *
 * @method SectionExternalSite|null find($id, $lockMode = null, $lockVersion = null)
 * @method SectionExternalSite|null findOneBy(array $criteria, array $orderBy = null)
 * @method SectionExternalSite[]    findAll()
 * @method SectionExternalSite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionExternalSiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SectionExternalSite::class);
    }

    public function add(SectionExternalSite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SectionExternalSite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SectionExternalSite[] Returns an array of SectionExternalSite objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SectionExternalSite
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
