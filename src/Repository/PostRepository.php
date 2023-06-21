<?php

namespace App\Repository;

use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function save(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Post $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findAllWithMinLikes(int $minLikes): array
    {
        $idList = $this->findAllQuery(
            withLikes: true
        )
            ->select('p.id') // only need the id here
            ->groupBy('p.id') // use aggregate function so we perform the below on it if not doctrine gets confused and doesn't know what to perforom the below on
            ->having('COUNT(l) >= :minLikes')
            ->setParameter('minLikes', $minLikes)
            ->getQuery()
            ->getResult(Query::HYDRATE_SCALAR_COLUMN) // returns a standard array of the post ids if not using this it is still asssoc array so below wouldn't work
        ;

        return $this->findAllQuery(
            withComments: true,
            withLikes: true,
            withUsers: true,
            withProfiles: true
        )
            ->where('p.id in (:idList)')
            ->setParameter('idList', $idList)
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAllByUser(
        int | User $user
    ): array
    {
        return $this->findAllQuery(
            withComments: true,
            withLikes: true,
            withUsers: true,
            withProfiles: true
        )
            ->where('p.user = :user')
            ->setParameter(
                'user',
                $user instanceof User ? $user->getId() : $user
            )
            ->getQuery()
            ->getResult()
        ;
    }

    public function findAllDsc()
    {
        return $this->findAllQuery(
            withComments: true,
            withLikes: true,
            withUsers: true,
            withProfiles: true
        )->getQuery()->getResult();
    }

    private function findAllQuery(
        bool $withComments = false,
        bool $withLikes = false,
        bool $withUsers = false,
        bool $withProfiles = false
    ): QueryBuilder
    {
        $query = $this->createQueryBuilder('p');

        if ($withComments) {
            $query->leftJoin('p.comments', 'c')
                ->addSelect('c');
        }

        if ($withLikes) {
            $query->leftJoin('p.likedBy', 'l')
                ->addSelect('l');
        }

        if ($withUsers || $withProfiles) {
            $query->leftJoin('p.user', 'u')
                ->addSelect('u');
        }

        if ($withProfiles) {
            $query->leftJoin('u.Profile', 'up')
                ->addSelect('up');
        }

        return $query->orderBy('p.created', 'DESC');
    }
//    /**
//     * @return Post[] Returns an array of Post objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Post
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
