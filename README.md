# Experiment in progress

# Humock - Human-friendly behat context

Humock (*human mock*) is a lightweight Behat context
able to let you use convenient methods inside Behat
tests.

## Installation

The recommended installation is done via `composer`:

    git clone git@github.com:odino/Humock.git

    wget http://getcomposer.org/composer.phar

    php composer.phar install

Then you can start writing your tests extending the `Tester`:

    class FeatureContext extends Humock\Context
    {
        ...
