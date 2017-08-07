<?php
include_once "src/FizzBuzz.php";

try {
    $fizzBuzz = new FizzBuzz();
    $fizzBuzz->setRange(1, 100);
    $fizzBuzz->addModulo('Fizz', 3);
    $fizzBuzz->addModulo('Buzz', 5);
    $fizzBuzz->run();
} catch (Exception $e) {
    echo $e->getMessage(), "<br>\n";
}