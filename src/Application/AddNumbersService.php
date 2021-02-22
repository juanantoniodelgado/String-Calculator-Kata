<?php

declare(strict_types=1);

namespace App\Application;

class AddNumbersService
{
    public function add(string $numbers): int
    {
        $result = 0;

        if (!empty($numbers)) {

            $numbers = preg_split('/[\n|,]/', $numbers);

            dump($numbers);

            foreach($numbers as $number) {
                $result += intval($number);
            }
        }

        return $result;
    }
}
