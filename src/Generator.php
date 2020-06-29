<?php

namespace FredBradley\NhsNumber;

use ImLiam\NhsNumber\NhsNumber;

/**
 * Class Generator
 * @package FredBradley\NhsNumber
 */
class Generator
{
    /**
     * Generate a single random NHS number.
     *
     * @param bool $unique
     * @return string
     */
    public static function nhsNumber(): string
    {
        return NhsNumber::getRandomNumber();
    }

    /**
     * Generate a list of random NHS numbers.
     *
     * @param int $count
     * @param bool $unique
     * @return array
     */
    public static function nhsNumbers(int $count, bool $unique = true): array
    {
        return NhsNumber::getRandomNumbers($count, $unique);
    }
}
