<?php
namespace Grumpy;

class FizzBuzz
{
    public function parse($value)
    {
        $response = '';

        if ($value % 3 == 0) {
            $response .= 'Fizz';
        }

        if ($value % 5 == 0) {
            $response .= 'Buzz';
        }

        if ($response == '') {
            $response = $value;
        }

        return $response;
    }
}

