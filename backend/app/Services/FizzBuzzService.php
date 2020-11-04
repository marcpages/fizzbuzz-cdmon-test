<?php

namespace App\Services;


class FizzBuzzService
{

    public static function getOutputFromNumber(int $number) {
        $multipleOf3 = ($number % 3 === 0);
        $multipleOf5 = ($number % 5 === 0);

        if ( $multipleOf3 && $multipleOf5 ) {
            return 'FizzBuzz';
        } else if ( $multipleOf3 ) {
            return 'Fizz';
        } else if ( $multipleOf5 ) {
            return 'Buzz';
        }

        return $number;
    }

}
