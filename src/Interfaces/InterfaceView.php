<?php
namespace Src\Interfaces;

interface InterfaceView
{
    public function setDir($dir);  //Optional

    public function setPageTitle($pageTitle);

    public function setMetaDescription($metaDescription);

    public function setMetaKeywords($metaKeywords);

    public function renderLayout();

}