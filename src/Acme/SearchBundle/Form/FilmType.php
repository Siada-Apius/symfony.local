<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Siada-Apius
 * Date: 31.07.13
 * Time: 17:48
 * To change this template use File | Settings | File Templates.
 */

namespace Acme\SearchBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('title');
    }

    public function getName(){
        return 'Acme_searchbundle_filmtype';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => "Acme\SearchBundle\Entity\Playlist",
            'intention' => 'search',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'validation_groups' => array('search_field'),
        );
    }
}