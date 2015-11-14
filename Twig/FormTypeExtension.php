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
    protected $globalEnvironment;

    public function initRuntime(\Twig_Environment $globalEnvironment) {
        $this->globalEnvironment = $globalEnvironment;
        $this->environment = new \Twig_Environment(new \Twig_Loader_String());
    }

    public function getFunctions() {
        return [
            new \Twig_SimpleFunction('jsblocklater', [$this, 'jsblocklater'], ['is_safe' => ["html"]]),
            new \Twig_SimpleFunction('jsblocknow', [$this, 'jsblocknow'], ['is_safe' => ["html"]]),
            new \Twig_SimpleFunction('jslater', [$this, 'jslater'], ['is_safe' => ["html"]]),
            new \Twig_SimpleFunction('jsnow', [$this, 'jsnow'], ['is_safe' => ["html"]]),
            new \Twig_SimpleFunction('cssnow', [$this, 'cssnow'], ['is_safe' => ["html"]]),
            new \Twig_SimpleFunction('csslater', [$this, 'csslater'], ['is_safe' => ["html"]]),
            new \Twig_SimpleFunction('render_block', [$this, 'renderBlock'], ['is_safe' => ["html"]]),
            new \Twig_SimpleFunction('render_multifile', [$this, 'renderMultifile'], ['is_safe' => ["html"]])
        ];
    }

    public function jsblocklater($src) {
        $this->jsblocks[] = $src;
    }

    public function jsblocknow() {
        $template = '{% for jsblock in jsblocks %}{{jsblock|raw}}{% endfor %}';
        $jsparam = $this->environment->render($template, ['jsblocks' => array_unique($this->jsblocks)]);
        //dump($jsparam);
        return $jsparam;
    }

    public function jslater($src) {
        $this->javascripts[] = $src;
    }

    public function jsnow() {
        $template = '{% for script in scripts %} <script  src="{{script}}" ></script>{% endfor %}';
        $scripts = array_unique($this->javascripts);

        $html = $this->environment->render($template, ['scripts' => $scripts]);
        return $html;
    }

    public function csslater($src) {
        $this->csslinks[] = $src;
    }

    public function cssnow() {
        $template = '{% for link in links %} <link rel="stylesheet" href="{{link}}" /> {% endfor %}';
        $links = array_unique($this->csslinks);
        dump($links);
        $html = $this->environment->render($template, ['links' => $links]);
        return $html;
    }

    public function getName() {
        return 'tmsolution_form_type_extension';
    }

    public function renderBlock($template, $block, $parameters = []) {

        $result = $this->globalEnvironment->loadTemplate($template)->renderBlock($block, $parameters);

        return $result;
    }

    public function renderMultifile() {

        return $this->renderBlock("TMSolutionFormTypeBundle:Form:multifile_upload.html.twig", 'multiFileupload');
    }

}
