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

class EditorType extends AbstractType {

    public function getParent() {
        return 'textarea';
    }

    public function getName() {
        return 'editor';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'lazyjs' => true,
            'language' => 'en-EN'
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars['lazyjs'] = $options['lazyjs'];
        $view->vars['language'] = $options['language'];
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->setAttribute('lazyjs', $options['lazyjs'])
                ->setAttribute('language', $options['language'])


        ;
    }

}
