<?php

namespace App\Repository;

use App\Entity\Annonce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Annonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonce[]    findAll()
 * @method Annonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Annonce::class);
    }

    public function simRechercheSQL() {


        $conn = $this->getEntityManager()->getConnection();

        $sql = 'SELECT * FROM annonce a
        WHERE a.surface >= :surfaceMin AND a.surface <= :surfaceMax AND a.bureaux >= :nbBureaux AND a.open_space >= :nbOpenSpace AND a.salle_reunion >= :nbSalleReunion AND a.espace_detente >= :nbEspaceDetente 
        ORDER BY a.surface DESC';     

        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'surfaceMin' => intval($_REQUEST["surfaceMin"] ?? "0"),
            'surfaceMax' => intval($_REQUEST["surfaceMax"] ?? "0"),
            'nbBureaux' => intval($_REQUEST["nbBureaux"] ?? "0"),
            'nbOpenSpace' => intval($_REQUEST["nbOpenSpace"] ?? "0"),
            'nbSalleReunion' => intval($_REQUEST["nbSalleReunion"] ?? "0"),
            'nbEspaceDetente' => intval($_REQUEST["nbEspaceDetente"] ?? "0")
        ]);

        return $stmt->fetchAll(); 
    }
    // /**
    //  * @return Annonce[] Returns an array of Annonce objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Annonce
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
