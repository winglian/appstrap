<?php

class MY_Loader extends CI_Loader
{

    protected $twig_loader;
    protected $twig;

    public function __construct()
    {
        call_user_func_array(array('parent',__FUNCTION__), func_get_args());

        $this->twig_loader = new Twig_Loader_Filesystem(array_keys($this->_ci_view_paths));
        $this->twig = new Twig_Environment($this->twig_loader);

    }

    public function view( $view, $vars = array(), $return = false)
    {
        $file_exists = false;
        $_ci_ext = pathinfo($view, PATHINFO_EXTENSION);
        $_ci_file = $view;
        if ($_ci_ext == 'twig') {
            if (strpos($view, '.html.twig')===false) {
                $_ci_file = str_replace('.twig', '.html.twig', $view);
            }
        } elseif ($_ci_ext == '') {
            $_ci_file = $view . ".html.twig";
        } else {
            $_ci_file = false;
        }

        if ($_ci_file !== false) {
            foreach ($this->_ci_view_paths as $view_file => $cascade)
            {
                if (file_exists($view_file.$_ci_file))
                {
                    $_ci_path = $view_file.$_ci_file;
                    $file_exists = TRUE;
                    break;
                }

                if ( ! $cascade)
                {
                    break;
                }
            }
        }


        if (!$file_exists) {
            return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
        }

        $this->twig_loader->setPaths(array_keys($this->_ci_view_paths));
        $this->twig->setLoader($this->twig_loader);

        try {
            $output = $this->twig->render($_ci_file, $vars);
        } catch (Exception $e) {
            show_error('Unable to load the requested file: '.$_ci_file);
        }

        if ($return == true) {
            return $output;
        }

        $_ci_CI =& get_instance();
        $_ci_CI->output->append_output($output);

    }
}
