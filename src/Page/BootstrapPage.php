<?php
namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class BootstrapPage extends Page
{
    protected $path = "http://getbootstrap.com/2.3.2/javascript.html";
    protected $current_url;
    protected $session;

    protected $elements = [
        "Launch demo modal" => ['xpath' => '/html/body/div[2]/div[2]/div[2]/section[3]/div[4]/a']
    ];

    public function press($arg1)
    {
        $this->session = $this->getSession('selenium2');
        $element = $this->session->getPage()->find('xpath', "//*[contains(@value, \"{$arg1}\")]");
        $element->click();
        $this->currentUrl = $this->session->getCurrentUrl();
    }

    public function getCurrentUrl()
    {
        return $this->currentUrl;
    }

    public function findOnPage($element_text)
    {
       $this->find('xpath', "//*[contains(@value, \"{$element_text}\")]");
    }
}


