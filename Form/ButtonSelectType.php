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

class ButtonSelectType extends AbstractType
{

    public function getParent()
    {
        return 'filter_entity';
    }

    public function getName()
    {
        return 'buttonselect';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'lazyjs',
            'apply_filter'
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'lazyjs' => true,
            'apply_filter' => function ( $filterQuery, $field, $values) {
                if (empty($values['value'])) {
                    return null;
                }

                $paramName = sprintf('p_%s', str_replace('.', '_', $field));
                $expression = $filterQuery->getExpr()->eq($field, ':' . $paramName);
                $parameters = array($paramName => $values['value']); // [ name => value ]
                return $filterQuery->createCondition($expression, $parameters);
            }
                ));
            }

            /**
             * {@inheritDoc}
             */
            public function buildView(FormView $view, FormInterface $form, array $options)
            {
                $view->vars['lazyjs'] = $options['lazyjs'];
                $view->vars['apply_filter'] = $options['apply_filter'];
            }

            /**
             * {@inheritDoc}
             */
            public function buildForm(FormBuilderInterface $builder, array $options)
            {
                $builder
                        ->setAttribute('lazyjs', $options['lazyjs'])
                        ->setAttribute('apply_filter', $options['apply_filter']);
            }

        }
        