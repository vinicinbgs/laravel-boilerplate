<?php

namespace App\Exceptions;

use Exception;

class AuthException extends Exception
{
    /** @var string $message */
    protected $message = "Invalid email or password, please try again";

    /** @var int $code */
    protected $code = 400;

    public function render()
    {
        return response()->json(
            [
                "title" => "error",
                "message" => $this->message,
                "code" => $this->code,
            ],
            $this->code
        );
    }
}
