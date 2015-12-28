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

class RangeSliderType extends AbstractType
{

    public function getParent()
    {
        return 'entity';
    }

    public function getName()
    {
        return 'rangeslider';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'valuesList',
            'currentValue',
            'lazyjs'
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'valuesList' => [],
            'currentValue' => null,
            'lazyjs' => true
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['lazyjs'] = $options['lazyjs'];
        $view->vars['valuesList'] = $options['valuesList'];
        $view->vars['currentValue'] = $options['currentValue'];
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->setAttribute('lazyjs', $options['lazyjs'])
                ->setAttribute('valuesList', $options['valuesList'])
                ->setAttribute('currentValue', $options['currentValue']);
    }

}
