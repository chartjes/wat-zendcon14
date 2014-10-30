<?php
namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class LeanpubPage extends Page
{
    protected $path = "https://leanpub.com/grumpy-phpunit/packages/book/purchases/new";

    public function findOnPage($element_text)
    {
        return $this->find('xpath', "//*[contains(@value, \"{$element_text}\")]");
    }

    public function getPath()
    {
        return $this->path;
    }
}

