<?php

namespace TMSolution\FormTypeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\AbstractType as FormAbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RangeType;

class NumericSliderType extends AbstractType
{

    public function getParent()
    {
        return RangeType::class;
    }

    public function getName()
    {
        return 'numericslider';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'valuesList',
            'currentValue',
            'lazyjs',
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'valuesList' => [],
            'currentValue' => null,
            'lazyjs' => true,
            'type' => 'single',
            'grid' => false,            
            'min' => 10,
            'max' => 100,
            'step' => 1,
            'disable' => false,
            // Unsupported options:   
            // http://ionden.com/a/plugins/ion.rangeSlider/en.html     
            //            'from' => 10,
            //            'to' => 100,
            //            'min_interval' => null,
            //            'max_interval' => null,
            //            'drag_interval' => false,
            //            'values' => [],
            //            'from_fixed' => false,
            //            'from_max' => 100,
            //            'from_min' => 10,                
            //            'from_shadow' => false,
            //            'to_fixed' => false,
            //            'to_min' => 10,
            //            'to_max' => 100,
            //            'to_shadow' => false,
            //            'prettify_enabled' => true,
            //            'prettify_separator' => '',
            //            'prettify' => null,
            //            'force_edges' => false,
            //            'keyboard' => false,
            //            'keyboard_step' => 5,
            //            'grid_margin' => true,
            //            'grid_num' => 4,
            //            'grid_snap' => false,
            //            'hide_min_max' => false,
            //            'hide_from_to' => false,
            //            'prefix' => '',
            //            'postfix' => '',
            //            'max_postfix' => '',
            //            'decorate_both' => true,
            //            'values_separator' => ' - ',
            //            'input_values_separator' => ';',
            //            'disable' => false,
            //            'onStart' => '',
            //            'onChange' => '',
            //            'onFinish' => '',
            //            'onUpdate' => ''
        ));
        
        $this->setAllowedTypes($resolver);
        $this->setAllowedValues($resolver);
        
        return $resolver;
    }

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['lazyjs'] = $options['lazyjs'];
        $view->vars['valuesList'] = $options['valuesList'];
        $view->vars['currentValue'] = $options['currentValue'];
        $view->vars['type'] = $options['type'];        
        $view->vars['min'] = $options['min'];
        $view->vars['max'] = $options['max'];
        $view->vars['step'] = $options['step'];
        $view->vars['grid'] = $options['grid'] ? 'true' : 'false';        
        $view->vars['disable'] = $options['disable'] ? 'true' : 'false';
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
    
    /**
     * Set allowed types
     * 
     * @param OptionsResolverInterface $resolver
     * @return OptionsResolverInterface
     */
    private function setAllowedTypes(OptionsResolverInterface $resolver)
    {
        $resolver->setAllowedTypes('type', 'string');
        $resolver->setAllowedTypes('min', 'int');
        $resolver->setAllowedTypes('max', 'int');
        $resolver->setAllowedTypes('step', ['int', 'float']);         
        $resolver->setAllowedTypes('disable', 'bool');
        $resolver->setAllowedTypes('grid', 'bool');        
    }
    
    /**
     * Set allowed values
     * 
     * @param OptionsResolverInterface $resolver
     * @return OptionsResolverInterface
     */
    private function setAllowedValues(OptionsResolverInterface $resolver)
    {
        $resolver->setAllowedValues('type', function($value) {
            return in_array(
                $value,
                ['single', 'double']
            );
        });
        
        $resolver->setAllowedValues('step', function($value) {
            return $value > 0;
        });
        
    }
    
}
