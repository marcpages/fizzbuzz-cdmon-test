<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class FizzBuzzTest extends TestCase
{

    /**
     * Test fizz buzz non matching number, should return the same number as output
     *
     * @return void
     */
    public function testFizzBuzzNonMatchingNumber()
    {
        $number = 1;
        $this->assertEquals($number, \App\Services\FizzBuzzService::getOutputFromNumber($number));
    }

    /**
     * Test fizz buzz multiple of 3, should return Fizz
     *
     * @return void
     */
    public function testFizzBuzzMultipleOf3()
    {
        $this->assertEquals('Fizz', \App\Services\FizzBuzzService::getOutputFromNumber(9));
    }

    /**
     * Test fizz buzz multiple of 5, should return Buzz
     *
     * @return void
     */
    public function testFizzBuzzMultipleOf5()
    {
        $this->assertEquals('Buzz', \App\Services\FizzBuzzService::getOutputFromNumber(10));
    }

    /**
     * Test fizz buzz multiple of 3 and 5, should return FizzBuzz
     *
     * @return void
     */
    public function testFizzBuzzMultipleOf3And5()
    {
        $this->assertEquals('FizzBuzz', \App\Services\FizzBuzzService::getOutputFromNumber(15));
    }

    /**
     * Test http fizz buzz get
     *
     * @return void
     */
    public function testFizzBuzzGet()
    {
        $number = 2;

        $this->get('/fizz-buzz?number='.$number)->seeJson([
            'output' => $number,
        ]);
    }

    /**
     * Test http fizz buzz get validation error
     *
     * @return void
     */
    public function testFizzBuzzGetValidationError()
    {
        $number = 'hello';

        $this->get('/fizz-buzz?number='.$number)->assertResponseStatus(422);
    }

}
