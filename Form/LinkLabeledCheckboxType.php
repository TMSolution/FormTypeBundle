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

class LinkLabeledCheckboxType extends AbstractType {

    public function getParent() {
        return 'checkbox';
    }

    public function getName() {
        return 'linklabeledcheckbox';
    }

    
     public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'routeParams',
            'route',
            'link'
        ));
    }
    
    
     public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'routeParams' => [],
            'route'=>'',
            'link'=>''
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars['link'] = $options['link'];
        $view->vars['route'] = $options['route'];
        $view->vars['routeParams'] = $options['routeParams'];
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->setAttribute('link', $options['link'])
                ->setAttribute('route', $options['route'])
                ->setAttribute('routeParams', $options['routeParams'])

        ;
    }

    

}
