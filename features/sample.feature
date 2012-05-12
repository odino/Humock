Feature: Add a product to the cart and try to pay with CC
    In order to purchase on namshi I want to add a
    product on my cart and the go to the checkout
    process.

    Scenario: Add a product to the cart
        Given I am on the homepage
        When I click on "Shoes"
        And I pick the first shoe
        And I select its size
        And I add it to the cart
        And I go to the checkout
        Then I can select to pay via credit card
        