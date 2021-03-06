<?php

declare(strict_types=1);

namespace App\Application;

use App\Exception\NegativesNotAllowedException;

class AddNumbersService
{
    public const SEPARATOR = ',';

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
        $errorPool = [];

        if (!empty($numbers)) {

            $numbers = $this->parse($numbers);

            foreach ($numbers as $number) {
                $number = intval($number);
                if ($number < 0) {
                    $errorPool[] = $number;
                } else if ($number<1000){
                    $result += $number;
                }
            }

            if (!empty($errorPool)) {

                throw new NegativesNotAllowedException(implode(self::SEPARATOR, $errorPool));
            }
        }

        return $result;
    }

    private function parse(string $numbers): array
    {
        if (str_starts_with($numbers, '//')) {
            $delimiters = substr($numbers, 2, strpos($numbers, "\n") -2);
            $numbers = substr($numbers, strpos($numbers, "\n"));

            if (substr_count($delimiters, '[') > 1) {

                $delimiters = str_replace('][', ',', $delimiters);
                $delimiters = str_replace('[', '', $delimiters);
                $delimiters = str_replace(']', '', $delimiters);

                $delimiters = explode(',', $delimiters);

                foreach ($delimiters as $delimiter) {

                    $numbers = str_replace($delimiter, self::SEPARATOR, $numbers);
                }

            } else {

                if (substr_count($delimiters, '[') === 1) {
                    $delimiters = substr($delimiters, 1, -1);
                }

                $numbers = str_replace($delimiters, self::SEPARATOR, $numbers);
            }
        }

        $numbers = str_replace("\n", self::SEPARATOR, $numbers);

        return explode(self::SEPARATOR, $numbers);
    }
}
