<?php

namespace FredBradley\NhsValidator;

use Illuminate\Contracts\Validation\Rule;
use ImLiam\NhsNumber\InvalidNhsNumberException;
use ImLiam\NhsNumber\NhsNumber;

/**
 * Class ValidNhsNumber.
 */
class NhsNumberRule implements Rule
{
    /**
     * @var string
     */
    public $message = '';

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        try {
            $nhsNumber = new NhsNumber($value);
            $nhsNumber->validate(); // Will throw exception here if false
            return true;
        } catch (InvalidNhsNumberException $e) {
            if ($e->getMessage() === 'The NHS number\'s check digit does not match.') {
                $this->message = 'This does not appear to be a valid NHS number.';
            } else {
                $this->message = $e->getMessage();
            }

            return false;
        }
    }

    /**
     * @param $attribute
     * @param $value
     * @param $params
     * @return bool
     */
    public function validate($attribute, $value, $params): bool
    {
        return $this->passes($attribute, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
