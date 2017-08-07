<?php

/**
 * Class FizzBuzz
 *
 * Fun short but dynamic implementation of FizzBuzz:
 * (https://www.youtube.com/watch?v=QPZ0pIK_wsc)
 * Tnx for the idea Tom Scott :-)
 *
 * PHP version 5+
 *
 * @author 雪地 (Daniel Koch)
 * @copyright 2017 <author>
 * @license GPLv2 http://www.gnu.org/licenses/gpl.html
 * @version 0.1
 */
class FizzBuzz
{

    /** @var array $range */
    private $range = [];

    /** @var array $moduloGroup */
    private $moduloGroup = [];

    /**
     * Adds an range between two number in whatever direction
     * @param $start
     * @param $end
     * @throws Exception
     */
    public function setRange($start, $end)
    {
        if(!is_int($start)) {
            throw new Exception("The parameter 'start' of the range has to be a integer number.");
        }
        if(!is_int($end)) {
            throw new Exception("The parameter 'end' of the range has to be a integer number.");
        }
        $this->range = range($start, $end);
    }

    /**
     * Adds a modulo with a name so the range can be checked on this
     * @param $name
     * @param $number
     * @throws Exception
     */
    public function addModulo($name, $number)
    {
        if(!is_int($number) && !empty($number)) {
            throw new Exception("The parameter 'value' has to be a integer number.");
        }
        if(!preg_match('/[a-zA-Z]{4}/',$name)) { //Todo: (?=[a-zA-Z]{4})(?=(?i)zz) or so ...
            throw new Exception(
                "The parameter 'name' has to consist out of [a-z] or [A-Z], has " .
                "to contain 'zz' and has to be exactly 4 characters all together ;-)"
            );
        }
        $this->moduloGroup[] = array(
            'name' => $name,
            'number' => $number,
        );
    }

    /**
     * Works usually well, but on rainy days it throws exceptions
     * @throws Exception
     */
    public function run()
    {
        if(!count($this->moduloGroup)) {
            throw new Exception("You have to add at least one modulo.");
        }
        if(count($this->range)<10) {
            throw new Exception("This game is no fun with a smaller range than 10.");
        }
        foreach ($this->range as $number) {
            $output = '';
            foreach ($this->moduloGroup as $modulo) {
                if (($number % $modulo['number']) == 0) {
                    $output .= $modulo['name'];
                }
            }
            if(empty($output)) {
                $output = $number;
            }
            echo "{$output}<br>";
        }
    }


}