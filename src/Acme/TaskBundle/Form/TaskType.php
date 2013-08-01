<?php

namespace Acme\TaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title', 'text', array(
                'label' => 'Title',
                'required' => true,
                'attr' => array(
                    'size' => '32',
                    'placeholder' => 'Enter title..',
                )
            ))

            ->add('author', 'text', array(
                'label' => 'Author',
                'required' => true,
                'attr' => array(
                    'size' => '32',
                    'placeholder' => 'Enter author..',
                )
            ))
            ->add('album', 'text', array(
                'label' => 'Album',
                'required' => true,
                'attr' => array(
                    'size' => '32',
                    'placeholder' => 'Enter album..',
                )
            ))
            ->add('year', 'text', array(
                'label' => 'Year',
                'required' => true,
                'attr' => array(
                    'size' => '15',
                    'placeholder' => 'Enter year..',
                )
            ))
            ->add('description', 'text', array(
                'label' => 'Description',
                'required' => true,
                'attr' => array(
                    'size' => '32',
                    'placeholder' => 'Enter description..',
                )

            ))
            ->add('category', 'text', array(
                'label' => 'Category',
                'required' => true,
                'attr' => array(
                    'size' => '32',
                    'placeholder' => 'Enter category..',
                )

            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\TaskBundle\Entity\Playlist'
        ));
    }

    public function getName()
    {
        return 'acme_taskbundle_tasktype';
    }
}
