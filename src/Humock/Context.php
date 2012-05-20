<?php

namespace Humock;

use Behat\Behat\Context\BehatContext;
use Behat\Mink\Selector\CssSelector;

class Context extends BehatContext
{
    protected $tester;
    
    public function __construct($config)
    {
        $browser    = isset($config['test']['browser']) ? $config['test']['browser'] : "firefox";
        $host       = isset($config['test']['host']) ? $config['test']['host'] : "http://127.0.0.1:4444/wd/hub";
        
        $this->tester = new \Behat\Mink\Mink(array(
            'webdriver' => new \Behat\Mink\Session(new \Behat\Mink\Driver\Selenium2Driver($browser, null, $host))
        ));
        $this->tester->setDefaultSessionName('webdriver');
    }
    
    
    /**
     * Points the browser to the given $url.
     * 
     * @param string $url 
     */
    public function visit($url)
    {
        $this->tester->getSession()->visit($url);
    }
    
    /**
     * Clicks on a link which has $identifier as its id|alt|title.
     * 
     * @param string $identifier 
     */
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
    
    /**
     * Holds the current session for some $seconds.
     * 
     * @param string $seconds 
     */
    public function wait($seconds)
    {
        $this->tester->getSession()->wait($seconds * 1000);
    }
}