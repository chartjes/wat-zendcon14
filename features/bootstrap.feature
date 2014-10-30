Feature: Modal dialog

    @javascript
    Scenario: Open modal dialog
        Given I am on the "Bootstrap Page"
        And I should see "Launch demo modal"
        When I press the modal button "Launch demo modal"
        Then I should see the modal "Modal Heading"
        And I should see "Text in a modal"
