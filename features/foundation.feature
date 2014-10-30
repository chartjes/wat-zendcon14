Feature: Test that JavaScript on a page was triggered

    @javascript
    Scenario:
        Given I am on "http://foundation.zurb.com/docs/components/reveal.html"
        And I should see the modal "Example Modal"
        When I activate the modal "Example Modal"
        Then I should see "This is a modal"
