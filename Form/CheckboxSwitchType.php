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

class CheckboxSwitchType extends AbstractType {

    public function getParent() {
        return 'checkbox';
    }

    public function getName() {
        return 'checkbox_switch';
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'on' => 'on',
            'off' => 'off',
        ));
        $resolver->setNormalizer('attr', function ($options, $value) {
            
            $value["class"] = "switch-input";
            if (array_key_exists("class", $value)) {
                $value["class"] .= " " . $value["class"];
            }
            

            return $value;
        });
    }

    /**
     * {@inheritDoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars['on'] = $options['on'];
        $view->vars['off'] = $options['off'];
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->setAttribute('on', $options['on'])
                ->setAttribute('off', $options['off'])
        ;
    }

}
