<?php

namespace UniPayment\SDK;

use Exception;

class UnipaymentSDKException extends Exception
{
    /**
     * Constructor
     *
     * @param string $message Error message
     * @param int $code HTTP status code
     */
    public function __construct(string $message = '', int $code = 0)
    {
        parent::__construct($message, $code);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}