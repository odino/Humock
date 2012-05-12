# Humock - Human-friendly functional tester

Humock (*human mock*) is a lightweight extension to Mink
able to let you write PHPUnit functional tests just as
your test would be a real, human, QA guy.

## Installation

The recommended installation is done via `composer`:

    git clone git@github.com:odino/Humock.git

    wget http://getcomposer.org/composer.phar

    php composer.phar install

Then you can start writing your tests extending the `Tester`:

    class myTest extends Humock\Tester
    {
        ...

## Basic usage
