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

class FileUploadType extends AbstractType
{

    public function getParent()
    {
        return 'file';
    }

    public function getName()
    {
        return 'fileupload';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'lazyjs' => true,
            'filesContainer' => null,
            'maxFileSize' => null,
            'acceptFileTypes' => null,
            'dataType' => 'json'
        ));
    }
    
    

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['lazyjs'] = $options['lazyjs'];
        $view->vars['filesContainer'] = $options['filesContainer'];
        $view->vars['maxFileSize'] = $options['maxFileSize'];
        $view->vars['acceptFileTypes'] = $options['acceptFileTypes'];
        $view->vars['dataType'] = $options['dataType'];
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->setAttribute('lazyjs', $options['lazyjs'])
                ->setAttribute('filesContainer', $options['filesContainer'])
                ->setAttribute('maxFileSize', $options['maxFileSize'])
                ->setAttribute('acceptFileTypes', $options['acceptFileTypes'])
                ->setAttribute('dataType', $options['dataType']);
    }

}
