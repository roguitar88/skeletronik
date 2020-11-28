<?php
namespace Src\Traits;

trait TraitUrlParser {

    #it divides the url into an array
    public function parseUrl()
    {
        //Here we treat the URL rules according to the .htaccess rules
        return explode("/", rtrim($_GET['url']), FILTER_SANITIZE_URL);
    }

}