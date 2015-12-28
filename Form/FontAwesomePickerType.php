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

class FontAwesomePickerType extends AbstractType {

    public function getParent() {
        return 'text';
    }

    public function getName() {
        return 'fontawesomepicker';
    }
    
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'defaultFont',
            'lazyjs'
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'lazyjs' => true,
            'defaultFont' => 'fa-phone'
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars['lazyjs'] = $options['lazyjs'];
         $view->vars['defaultFont'] = $options['defaultFont'];
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->setAttribute('lazyjs', $options['lazyjs'])
                ->setAttribute('defaultFont', $options['defaultFont'])

        ;
    }

}
