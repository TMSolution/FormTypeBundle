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

class FileUploadImageType extends AbstractType {

    public function getParent() {
        return 'file';
    }

    public function getName() {
        return 'fileuploadimage';
    }
    
    
    /*
     {%if filesContainer%}filesContainer:  $('{{filesContainer}}').first(),{% endif %}
                                    {%if maxFileSize %}maxFileSize: {{'{'~maxFileSize~')'}}{% else %}maxFileSize: {999000}{% endif%},
                                    {%if acceptFileTypes %}acceptFileTypes: /(\.|\/){{acceptFileTypes}}$/i {% else %}acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i{% endif%},
                                   
*/
    
public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'lazyjs' => true,
            'filesContainer' =>null,
            'maxFileSize' => null,
            'acceptFileTypes' =>null
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars['lazyjs'] = $options['lazyjs'];
        $view->vars['filesContainer'] = $options['filesContainer'];
        $view->vars['maxFileSize'] = $options['maxFileSize'];
        $view->vars['acceptFileTypes'] = $options['acceptFileTypes'];
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->setAttribute('lazyjs', $options['lazyjs'])
                ->setAttribute('filesContainer', $options['filesContainer'])
                ->setAttribute('maxFileSize', $options['maxFileSize'])
                ->setAttribute('acceptFileTypes', $options['acceptFileTypes'])
              


        ;
    
    }

    

}
