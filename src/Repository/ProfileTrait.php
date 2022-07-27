<?php

namespace App\Repository;

use App\Entity\User;

Trait ProfileTrait
{
    private function __findByUser(User $user)
    {
        return $this->createQueryBuilder('p')
        // Faire une jointure avec L'utilisateur associé au profil éditeur.
        ->join('p.user', 'u')
        // Ne retenir que le profil éditeur qui est associé à l'utilisateur passé en parametre de la fonction
        ->andWhere('u.id = :userId')
        ->setParameter('userId',$user->getId())
        // Éxecution de la requete
        ->getQuery()
        ->getOneOrNullResult()
        ;
    }
}
