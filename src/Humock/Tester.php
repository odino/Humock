<?php

/**
 * Description of Tester
 *
 * @author odino
 */

namespace Humock;

use Behat\Mink\Mink;
use Behat\Mink\PHPUnit\TestCase;
use Behat\Mink\Selector\CssSelector as Selector;

class Tester extends TestCase
{
    public function visit($url)
    {
        $this->getSession()->visit($url);
    }
    
    public function getSession($name = 'webdriver')
    {
        return parent::getSession($name);
    }

    protected function getClient()
    {
        return $this->getSession()->getDriver();
    }
    
    protected function getElement($selector)
    {
        return $this->getSession()->getPage()->find('css', $selector);
    }
    
    protected function wait($duration)
    {
        $this->getSession()->wait((int) ($duration * 1000));
    }
    
    protected function click($selector)
    {
        $this->getClient()->click($this::xCss($selector));
    }
    
    protected function xCss($cssSelector)
    {
        return Selector::translateToXPath($cssSelector);
    }
    
    protected function check($selector)
    {
        return $this->getClient()->check($this::xCss($selector));
    }
    
    protected function press($selector)
    {        
        $this->getSession()->getDriver()->setValue($this->xCss($selector), 1);
    }

}
