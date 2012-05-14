<?php

namespace Humock;

use Behat\Behat\Context\BehatContext;
use Behat\Mink\Selector\CssSelector;

class Context extends BehatContext
{
    protected $tester;
    
    public function __construct()
    {
        $browser = 'firefox';
        $host    = 'http://localhost:4444/wd/hub';
        
        $this->tester = new \Behat\Mink\Mink(array(
            'webdriver' => new \Behat\Mink\Session(new \Behat\Mink\Driver\Selenium2Driver($browser, null, $host))
        ));
        $this->tester->setDefaultSessionName('webdriver');
    }
    
    public function visit($url)
    {
        $this->tester->getSession()->visit($url);
    }
    
    public function click($identifier)
    {
        $session    = $this->tester->getSession();
        $selector   = new CssSelector;
        
        try {
            $xpath = $selector->translateToXPath($identifier);
            
            $session->getDriver()->click($xpath);
        }
        catch (\Exception $e) {
            $session->getPage()->clickLink($identifier);
        }
    }
    
    public function wait($seconds)
    {
        $this->tester->getSession()->wait($seconds * 1000);
    }
}