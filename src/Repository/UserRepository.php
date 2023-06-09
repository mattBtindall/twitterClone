<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function save(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);

        $this->save($user, true);
    }

    public function findUserWithAll(int | User $user): User
    {
        return $this->createQueryBuilder('u')
            ->where('u.id = :user')
            ->setParameter('user', $user instanceof User ? $user->getId() : $user)
            ->leftJoin('u.follows', 'flws')
            ->addSelect('flws')
            ->leftJoin('u.followers', 'flwrs')
            ->addSelect('flwrs')
            ->leftJoin('u.posts', 'p')
            ->addSelect('p')
            ->leftJoin('u.likes', 'l')
            ->addSelect('l')
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findLikedPostsByUser(int | User $user): array
    {
        return $this->createQueryBuilder('u')
            ->where('u.id = :user')
            ->setParameter('user', $user instanceof User ? $user->getId() : $user)
            ->leftJoin('u.likes', 'l')
            ->addSelect('l')
            ->leftJoin('l.likedBy', 'll')
            ->addSelect('ll')
            ->leftJoin('l.comments', 'lc')
            ->addSelect('lc')
            ->getQuery()
            ->getResult()
        ;
    }

    public function searchUser(string $searchTerm): array
    {
        return $this->createQueryBuilder('u')
            ->leftJoin('u.Profile', 'p')
            ->addSelect('p')
            ->where("u.email LIKE CONCAT('%', :searchTerm, '%') OR p.name LIKE CONCAT('%', :searchTerm, '%')")
            ->setParameter('searchTerm', $searchTerm)
            ->getQuery()
            ->getResult()
        ;
    }
//    /**
//     * @return User[] Returns an array of User objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
