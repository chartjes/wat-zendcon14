Feature: Functionality of Grumpy PHPUnit site

    Scenario: Purchase link sends to Leanpub
        Given I am on the "Grumpy Page"
        When I press "Buy Now Via Leanpub for $29"
        Then I should be on the "Leanpub Page"
        And I should see "PHPUnit Cookbook"


