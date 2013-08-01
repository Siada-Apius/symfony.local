<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Siada-Apius
 * Date: 31.07.13
 * Time: 17:53
 * To change this template use File | Settings | File Templates.
 */

namespace Acme\SearchBundle\Repository;

use Doctrine\ORM\EntityRepository;

class FilmRepository extends EntityRepository
{
    public function searchFilm( $title ){
        $qb = $this->createQueryBuilder('f');
        $qb->where( 'f.title LIKE :title' )
            ->setParameter( 'title', '%'. $title .'%' );

        return $qb->getQuery()->getResult();
    }
}