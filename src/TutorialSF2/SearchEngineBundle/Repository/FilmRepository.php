<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Siada-Apius
 * Date: 17.07.13
 * Time: 21:14
 * To change this template use File | Settings | File Templates.
 */


namespace TutorialSF2\SearchEngineBundle\Repository;

use Doctrine\ORM\EntityRepository;

class FilmRepository extends EntityRepository
{
    public function searchFilm( $description ){
        $qb = $this->createQueryBuilder('f');
        $qb->where( 'f.description LIKE :title' )
            ->setParameter( 'title', '%'. $description .'%' );

        return $qb->getQuery()->getResult();
    }
}