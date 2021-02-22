<?php

declare(strict_types=1);

namespace App\Application;

class AddNumbersService
{
    public function add(string $numbers): int
    {
        $result = 0;
        $delimiter = ',';

        if (!empty($numbers)) {

            if (str_starts_with($numbers, '//')) {

                $delimiter = substr($numbers, 2, strpos($numbers, "\n") -2);
                $numbers = substr($numbers, strpos($numbers, "\n"));

            } else {

                $numbers = str_replace("\n", ',', $numbers);
            }

            $numbers = explode($delimiter, $numbers);

            foreach ($numbers as $number) {
                $result += intval($number);
            }
        }

        return $result;
    }
}
