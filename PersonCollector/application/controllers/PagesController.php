<?php


namespace PersonCollector\Controllers;

use PersonCollector\Core\Helpers;


class PagesController
{
    public static function ViewPage(string $page)
    {
        Helpers::viewPage($page);
    }
}