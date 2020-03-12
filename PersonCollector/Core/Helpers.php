<?php


namespace PersonCollector\Core;


class Helpers
{
    public static function viewPage($name)
    {
        $template_file = 'application/pages/' . $name . '.php';

        if (!is_readable($template_file)) {
            return;
        }
        include $template_file;
    }
}