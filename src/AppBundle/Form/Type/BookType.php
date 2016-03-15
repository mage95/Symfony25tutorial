<?php
/**
 * Created by PhpStorm.
 * User: mage95
 * Date: 3/14/16
 * Time: 3:44 PM
 */

namespace AppBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BookType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text')
            ->add('author', 'text')
            ->add('description', 'text')
            ->add('genre','text')
            ->add('publishedDate', 'datetime')
            ->add('registeredDate', 'datetime')
            ->add('save', 'submit');


    }

    public function getName()
    {
        return 'book';
    }
}