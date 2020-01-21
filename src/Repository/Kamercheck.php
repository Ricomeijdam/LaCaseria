<?php

namespace App\Repository;

use App\Entity\Kamer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kamer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kamer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kamer[]    findAll()
 * @method Kamer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */

class Kamercheck extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kamer::class);
    }
}