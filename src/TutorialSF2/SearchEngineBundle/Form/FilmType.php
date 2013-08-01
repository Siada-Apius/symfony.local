<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Siada-Apius
 * Date: 17.07.13
 * Time: 21:13
 * To change this template use File | Settings | File Templates.
 */

namespace TutorialSF2\SearchEngineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('title');
    }

    public function getName(){
        return 'TutorialSF2_searchenginebundle_filmtype';
    }

    public function getDefaultOptions(array $options) {
        return array(
            'data_class' => "TutorialSF2\SearchEngineBundle\Entity\Film",
            'intention' => 'search',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            'validation_groups' => array('search_field'),
        );
    }
}