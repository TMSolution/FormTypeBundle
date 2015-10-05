<?php

namespace TMSolution\FormTypeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CheckboxSwitchType extends AbstractType {

    public function getParent() {
        return 'checkbox';
    }

    public function getName() {
        return 'checkbox_switch';
    }

    public function configureOptions(OptionsResolver $resolver) {

//        $resolver->setDefaults([
//            'attr' => [
//                'class' => 'switch-input'
//            ]
//        ]);
        $resolver->setNormalizer('attr', function ($options, $value) {
            if ($value["class"]) {
                $value["class"] = " ".$value["class"];
            }
            $value["class"] ="switch-input".$value["class"];

            return $value;
        });
    }

}
