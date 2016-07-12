<?php

/**
 * Created by Timothy BOURGAULT.
 * Date: 15/06/2016
 * Version: 1.0
 */
Class Prime
{

    private $max;
    private $memorySize;
    private $min;
    private $primes = array();
    private $result = false;

    function __construct()
    {
        $this->max = 100;
        $this->memorySize = (int)($this->max / 2);
        $this->min = 1;
    }


    private function getPrimeInRange($max)
    {

        if ($max < 100001 && ($this->min < $max)) $this->max = $max;
        $tab = array();
        $sqrtMax = (int)(sqrt($this->max) + 1);

        for ($a = $this->min; $a < $this->max; $a += 2) {
            $tab[$a] = 0;
        }
        for ($i = $this->min + 2; $i < $sqrtMax; $i += 2) {
            $j = $i * $i;
            if (!$tab[$j]) {
                while ($j < $this->max) {
                    $tab[$j] = 1;
                    $j += $i;
                }
            }
        }
        foreach ($tab as $k => $value) {
            if ($value === 0)
                $this->primes[] = $k;
        }
        return true;
    }
    
    public function getNextPrime($val)
    {
        if ($val > 100001 || $val < 2) {
            throw new Exception('Value must be contained between 3 and 1000000');
        }
        $max = $val + 1001;
        $this->getPrimeInRange($max);
        $i = 0;
        while ($this->primes[$i] < $val && $i < $max) {
            $i++;
        }
        return $this->primes[$i + 1];
    }

    public function isPrime($val)
    {
        if ($val > 100001 || $val < 2) {
            throw new Exception('Value must be contained between 3 and 1000000');
        }
        $max = $val + 1001;
        $this->getPrimeInRange($max);
        return in_array($val, $this->primes);
    }

    public function getSamplePrime($nb, $length, $order = null)
    {
        $start = microtime(true);
        if ($length < 6) {
            $offset = intval(str_pad(1, $length + 1, "0", STR_PAD_RIGHT));
            $j = 0;
            $this->getPrimeInRange($offset);
            $offset2 = intval(str_pad(1, $length - 1, "0", STR_PAD_RIGHT));
            foreach ($this->primes as $k => $value) {
                if ($value < $offset2)
                    unset($this->primes[$k]);
            }
            $this->primes = array_values($this->primes);
            $randMax = count($this->primes);
            if ($randMax > $nb) {
                if ($order == "consecutif") {
                    $var = rand(0, ((count($this->primes) - $nb) - 1));
                    for ($i = $var; $i <= (($nb + $var) - 1); $i++) {
                        $this->result[$j] = $this->primes[$i];
                        $j++;
                    }
                } else {
                    $MyCollection = array();
                    while (count($MyCollection) < $nb) {
                        $MyCollection[rand(0, $randMax - 1)] = true;
                    }
                    foreach ($MyCollection as $k => $v) {
                        $this->result[] = $this->primes[$k];
                    }
                }
            }
        }
        $end = microtime(true);
        echo ($end - $start) . "<br>";
        return $this->result;
    }
}



$var = new Prime();
var_dump($var->getSamplePrime(9000, 5));



