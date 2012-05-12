<?php

require_once 'vendor/autoload.php';


use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends Humock\Context
{    
    /**
     * @Given /^I am on the homepage$/
     */
    public function iAmOnTheHomepage()
    {
        $this->visit("http://namshi.com");
    }

    /**
     * @Given /^I click on "([^"]*)"$/
     */
    public function iClickOn($link)
    {
        $this->click($link);
    }

    /**
     * @Given /^I pick the first shoe$/
     */
    public function iPickTheFirstShoe()
    {
        $this->click('ul.productsCatalog li a.itm-link');
    }

    /**
     * @Given /^I select its size$/
     */
    public function iSelectItsSize()
    {
        $this->click('ul.prd-option-collection li');
    }

    /**
     * @Given /^I add it to the cart$/
     */
    public function iAddItToTheCart()
    {
        $this->click('button#AddToCart');
    }

    /**
     * @Given /^I go to the checkout$/
     */
    public function iGoToTheCheckout()
    {
        $this->click('a[href="/checkout/finish"]');
    }

    /**
     * @Then /^I can select to pay via credit card$/
     */
    public function iCanSelectToPayViaCreditCard()
    {
        $this->click('#creditcard');
        $this->wait(2);
    }
}
