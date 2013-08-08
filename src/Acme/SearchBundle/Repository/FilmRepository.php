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
    public function searchFilm($category){

        $qb = $this->createQueryBuilder('a');
        $qb->where( 'a.title LIKE :title' )
            ->setParameter( 'title', '%'. $category .'%' );

        return $qb->getQuery()->getResult();

    }
}