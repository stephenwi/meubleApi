<?php

namespace App\Repository;

use App\Entity\CustomerCompleteInformation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CustomerCompleteInformation>
 *
 * @method CustomerCompleteInformation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerCompleteInformation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerCompleteInformation[]    findAll()
 * @method CustomerCompleteInformation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerCompleteInformationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerCompleteInformation::class);
    }

    public function add(CustomerCompleteInformation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CustomerCompleteInformation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CustomerCompleteInformation[] Returns an array of CustomerCompleteInformation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CustomerCompleteInformation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
