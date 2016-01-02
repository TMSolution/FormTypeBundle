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

class DatePickerType extends AbstractType {

    public function getParent() {
        return 'date';
    }

    public function getName() {
        return 'datepicker';
    }

     public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'lazyjs' => true,
            'icon' => 'glyphicon-calendar',
            'sideBySide' => 'false',
            'widgetFormat'=>'YYYY-MM-DD HH:mm',
            'locale' => false
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars['lazyjs'] = $options['lazyjs'];
        $view->vars['icon'] = $options['icon'];
        $view->vars['sideBySide'] = $options['sideBySide'];
        $view->vars['locale'] = $options['locale'];
        $view->vars['widgetFormat'] = $options['widgetFormat'];
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->setAttribute('lazyjs', $options['lazyjs'])
                ->setAttribute('icon', $options['icon'])
                ->setAttribute('sideBySide', $options['sideBySide'])
                ->setAttribute('locale', $options['locale'])
                ->setAttribute('widgetFormat', $options['widgetFormat'])
        ;
    }

    

}
