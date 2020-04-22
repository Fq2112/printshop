<?php


namespace App\Support;


class NumberShorten
{
    public function redenominate($number, $precision = 2, $divisors = null, $dec_point = ',', $thousand_point = '.')
    {
        if (!isset($divisors)) {
            $divisors = array(
                pow(1000, 0) => '', // 1000^0 == 1
                pow(1000, 1) => 'K', // Thousand
                pow(1000, 2) => app()->isLocale('id') ? 'jt' : 'M', // Million
                pow(1000, 3) => app()->isLocale('id') ? 'M' : 'B', // Billion
                pow(1000, 4) => 'T', // Trillion
                pow(1000, 5) => 'Qa', // Quadrillion
                pow(1000, 6) => 'Qi', // Quintillion
            );
        }

        foreach ($divisors as $divisor => $shorthand) {
            if (abs($number) < ($divisor * 1000)) {
                break;
            }
        }

        return number_format($number / $divisor, $precision, $dec_point, $thousand_point) . ' ' . $shorthand;
    }
}
