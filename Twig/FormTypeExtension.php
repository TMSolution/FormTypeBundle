<?php

/**
 * Description of FormTypeExtension
 *
 * @author Lukasz
 */

namespace TMSolution\FormTypeBundle\Twig;

class FormTypeExtension extends \Twig_Extension {

    protected $javascripts = [];
    protected $jsblocks = [];
    protected $csslinks = [];
    protected $environment;

    public function initRuntime(\Twig_Environment $environment) {
       // $this->environment = $environment;
        $this->environment = new \Twig_Environment(new \Twig_Loader_String());
    }

    public function getFunctions() {
        return [
            new \Twig_SimpleFunction('jsblocklater', [$this, 'jsblocklater']),
            new \Twig_SimpleFunction('jsblocknow', [$this, 'jsblocknow']),
            new \Twig_SimpleFunction('jslater', [$this, 'jslater']),
            new \Twig_SimpleFunction('jsnow', [$this, 'jsnow']),
            new \Twig_SimpleFunction('cssnow', [$this, 'cssnow']),
            new \Twig_SimpleFunction('csslater', [$this, 'csslater'])
        ];
    }

    public function jsblocklater($src) {
        $this->jsblocks[] = $src;
    }

    public function jsblocknow() {
        $template = '{% for jsblock in jsblocks %}{{jsblock|raw}}{% endfor %}';
        $jsparam = $this->environment->render($template, ['jsblocks' => $this->jsblocks]);
        dump($jsparam);
        return $jsparam;
    }

    public function jslater($src) {
        $this->javascripts[] = $src;
    }

    public function jsnow() {
        $template = '{% for script in scripts %}<script type="text/
javascript" src="{{script}}" />{% endfor %}';
        $scripts = array_unique($this->javascripts);
        return $this->environment->render($template, ['scripts' => $this->javascripts]);
    }

    public function csslater($src) {
        $this->csslinks[] = $src;
    }

    public function cssnow() {
        $template = '{% for link in links %}<link rel="stylesheet" href="{{link}}" />{% endfor %}';
        $links = array_unique($this->csslinks);
        return $this->environment->render($template, ['links' => $this->csslinks]);
    }

    public function getName() {
        return 'tmsolution_form_type_extension';
    }

}
