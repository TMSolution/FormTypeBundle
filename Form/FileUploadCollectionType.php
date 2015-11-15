<?php

namespace TMSolution\FormTypeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\AbstractType as FormAbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
// For Symfony 2.1 and higher:
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FileUploadCollectionType extends AbstractType
{

    public function getParent()
    {
        return 'file';
    }

    public function getName()
    {
        return 'fileuploadcollection';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'lazyjs' => true,
            'parentName' => '',
            'entityName' => '',
            'deleteRoute' => '',
            'createRoute' => '',
            'formName' => ''
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['lazyjs'] = $options['lazyjs'];
        if ($options['parentName']) {
            $view->vars['parentName'] = $options['parentName'];
        } else {
            throw new \Exception('parentName doesn\'t exists!');
        }

        if ($options['entityName']) {
            $view->vars['entityName'] = $options['entityName'];
        } else {
            throw new \Exception('entityName doesn\'t exists!');
        }
        
        
        if ($options['deleteRoute']) {
            $view->vars['deleteRoute'] = $options['deleteRoute'];
        } else {
            throw new \Exception('deleteRoute doesn\'t exists!');
        }
        
        if ($options['createRoute']) {
            $view->vars['createRoute'] = $options['createRoute'];
        } else {
            throw new \Exception('createRoute doesn\'t exists!');
        }
        
        if ($options['formName']) {
            $view->vars['formName'] = $options['formName'];
        } else {
            throw new \Exception('formName doesn\'t exists!');
        }
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->setAttribute('lazyjs', $options['lazyjs'])
                ->setAttribute('parentName', $options['parentName'])
                ->setAttribute('entityName', $options['entityName'])
                ->setAttribute('createRoute', $options['createRoute'])
                ->setAttribute('deleteRoute', $options['deleteRoute'])
                ->setAttribute('formName', $options['formName'])

        ;
    }

}
