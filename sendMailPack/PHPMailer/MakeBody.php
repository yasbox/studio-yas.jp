<?php

class MakeBody
{
    public function __construct()
    {

    }

    public function make_html($template, $formData)
    {
        ob_start();
        include(dirname(__FILE__) . '/template/'. $template . '.php');
        $body = nl2br(ob_get_contents());
        ob_end_clean();

        return $body;
    }

    public function make_plain($template, $formData)
    {
        ob_start();
        include(dirname(__FILE__) . '/template/' . $template . '.php');
        $body = nl2br(ob_get_contents());
        ob_end_clean();

        return $body;
    }
}
