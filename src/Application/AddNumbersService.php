<?php

declare(strict_types=1);

namespace App\Application;

use App\Exception\NegativesNotAllowedException;

class AddNumbersService
{
    /**
     * @param string $numbers
     *
     * @return int
     *
     * @throws NegativesNotAllowedException
     */
    public function add(string $numbers): int
    {
        $result = 0;
        $delimiter = ',';
        $errorPool = [];

        if (!empty($numbers)) {

            if (str_starts_with($numbers, '//')) {
                $delimiter = substr($numbers, 2, strpos($numbers, "\n") -2);
                $numbers = substr($numbers, strpos($numbers, "\n"));
            }

            $numbers = str_replace("\n", $delimiter, $numbers);
            $numbers = explode($delimiter, $numbers);

            foreach ($numbers as $number) {
                if (intval($number) < 0) {
                    $errorPool[] = $number;
                } else {
                    $result += intval($number);
                }
            }

            if (!empty($errorPool)) {

                throw new NegativesNotAllowedException(implode($delimiter, $errorPool));
            }
        }

        return $result;
    }
}
