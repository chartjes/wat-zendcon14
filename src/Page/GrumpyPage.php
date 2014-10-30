<?php
namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class GrumpyPage extends Page
{
    protected $path = '/';
    protected $current_url;
    protected $session;

    protected $elements = [
        'Buy Now Via Leanpub for $29' => ['xpath' => '/html/body/div/div[3]/div/form/input[2]']
    ];

    public function press($arg1)
    {
        $this->session = $this->getSession('goutte');
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

