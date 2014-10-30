Feature: FizzBuzz tests

    Scenario: Successfully turn 3 into Fizz
        Given I have a FizzBuzz
        When I tell it to parse '3'
        Then I should get back 'Fizz'
