<?php

class StringCalculator
{
    /**
     *
     */
    const MAX_NUMBER_ALLOWED = 1000;

    /**
     * @param $numbers
     * @return int
     */
    public function add($numbers){

        $numbers = $this->parseNumbers($numbers);

        $solution = 0;

        foreach($numbers as $number){
            $this->guardAgainstNegativeNumbers($number);
            if($number >= self::MAX_NUMBER_ALLOWED){
                continue;
            }
            $solution += $number;
        }

        return $solution;
    }

    /**
     * @param $number
     */
    private function guardAgainstNegativeNumbers($number)
    {
        if ($number < 0) {
            throw new InvalidArgumentException("Negative numbers are disallowed: {$number}");
        }
    }

    /**
     * @param $numbers
     * @return array
     */
    private function parseNumbers($numbers)
    {
        return array_map('intval', preg_split('/\s*(,|\\\n)\s*/', $numbers));
    }
}
