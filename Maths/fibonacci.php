<?php

/*
 * Run script and test execution time with following script
        $executionTime = New ExecutionTime();
        print_r(fibonacciRecursive(10));
 */

class ExecutionTime
{
    private $start_time = 0;
    private $end_time = 0;
    private $execution_time = 0;

    public function __construct()
    {
        $this->start_time = microtime(true);
    }

    public function __destruct()
    {
        $this->end_time = microtime(true);
        $this->execution_time = $this->end_time - $this->start_time;
        echo "Executed in $this->execution_time seconds\n";
    }
}

function fibonacciRecursive(int $num)
{
    /*
     * Fibonacci series using recursive approach
     */

    $fib_series = [0, 1];

    if ($num < 0) {
        throw new \Exception("Number must be greater than 0.");
    } else {
        $a = $fib_series[0];
        $b = $fib_series[1];

        foreach (range(0, $num - count($fib_series) - 1) as $range) {
            $t = $a;
            $a = $b;
            $b = $t + $b;
            array_push($fib_series, $b);
        }
    }

    return $fib_series;
}

function fibonacciWithBinetFormula(int $num)
{
    /*
     * Fibonacci series using Binet's formula given below
     * binet's formula =  ((1 + sqrt(5) / 2 ) ^ n - (1 - sqrt(5) / 2 ) ^ n ) ) / sqrt(5)
     * More about Binet's formula found at http://www.maths.surrey.ac.uk/hosted-sites/R.Knott/Fibonacci/fibFormula.html#section1
     */

    $fib_series = [];

    if ($num < 0) {
        throw new \Exception("Number must be greater than 0.");
    } else {
        $sqrt = sqrt(5);
        $phi_1 = (1 + $sqrt) / 2;
        $phi_2 = (1 - $sqrt) / 2;

        foreach (range(0, $num - 1) as $n) {
            $seriesNumber = (pow($phi_1, $n) - pow($phi_2, $n)) / $sqrt;
            array_push($fib_series, $seriesNumber);
        }

    }

    return $fib_series;
}