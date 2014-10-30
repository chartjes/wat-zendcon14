<?php

use Behat\Behat\Context\BehatContext,
Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\Mink\Driver\GoutteDriver;
use Behat\MinkExtension\Context\MinkContext;
use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;

require '../web/vendor/autoload.php';

/**
 * Features context.
 */
class FeatureContext extends PageObjectContext implements Behat\Behat\Context\Context, Behat\Behat\Context\SnippetAcceptingContext
{
    public $fizzBuzz;
    public $response;
    public $modalElement;

    /**
     * @Given /^I have a FizzBuzz$/
     */
    public function iHaveAFizzbuzz()
    {
        $this->fizzBuzz = new Grumpy\FizzBuzz();
    }

    /**
     * @When /^I tell it to parse \'([^\']*)\'$/
     */
    public function iTellItToParse($arg1)
    {
        $this->response = $this->fizzBuzz->parse($arg1);
    }

    /**
     * @Then /^I should get back \'([^\']*)\'$/
     */
    public function iShouldGetBack($arg1)
    {
        if ($this->response !== $arg1) {
            throw new Exception("Got back {$this->response} when expecting {$arg1}");
        }
    }

    /**
     * @Given I am on the :arg1
     */
    public function iAmOnThe($arg1)
    {
        $page = $this->getPage($arg1);
        $page->open();
        $this->session = $page->getSession();
    }

    /**
     * @When I press :arg1
     */
    public function iPress($arg1)
    {
        $page = $this->getPage('Grumpy Page');
        $page->press($arg1);
        $this->currentUrl = $page->getCurrentUrl();
        $this->session = $page->getSession();
    }

    /**
     * @Then I should be on the :arg1
     */
    public function iShouldBeOnThe($arg1)
    {
        $page = $this->getPage($arg1);

        if ($page->getPath() !== $this->currentUrl) {
            throw new Exception("Did not find {$arg1}");
        }
    }

    /**
     * @Then I should see :arg1
     */
    public function iShouldSee($arg1)
    {
        $element = $this->session->getPage()->find('xpath', "//*[contains(@value, \"{$arg1}\")]");
    }

    /**
     * @When I press the modal button :arg1
     */
    public function iPressTheModalButton()
    {
        $value = "Launch demo modal";
        $element = $this->session->getPage()->find('xpath', "//*[contains(@value, \"{$value}\")]");
    }

    /**
     * @Then I should see the modal :arg1
     */
    public function iShouldSeeTheModal($arg1)
    {
        $value = "Modal Heading";
        $element = $this->session->getPage()->find('xpath', "//*[contains(@value, \"{$value}\")]");
    }
}
