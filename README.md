# Experiment in progress

# Humock - Human-friendly behat context

Humock (*human mock*) is a lightweight Behat context
able to let you use convenient methods to leverage
the power of Mink, an abstraction layer for functional
testing.

With Humock you can combine Behat and Mink easily,
so being able to do BDD during functional testing.

An example test will look like:

    class FeatureContext extends Humock\Context
    {    
        /**
         * @Given /^I am on the homepage$/
         */
        public function iAmOnTheHomepage()
        {
            $this->visit("http://website.com");
        }

        /**
         * @Given /^I click on "([^"]*)"$/
         */
        public function iClickOn($link)
        {
            $this->click($link);
        }

## Installation

The recommended installation is done via `composer`:

    git clone git@github.com:odino/Humock.git

    wget http://getcomposer.org/composer.phar

    php composer.phar install

Then you can start writing your tests extending the `Tester`:

    class FeatureContext extends Humock\Context
    {
        ...
