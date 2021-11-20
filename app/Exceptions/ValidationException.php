<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class ValidationException extends Exception
{
    /**
     * Any extra data to send with the response.
     *
     * @var array
     */
    public $data = [];

    /**
     * The status code to use for the response.
     *
     * @var integer
     */
    public $status = 422;

    /**
     * The messages for the response.
     *
     * @var array
     */
    public $message = "Validation error";

    /**
     * The details for the response.
     *
     * @var array
     */
    public $details = [];

    /**
     * Create a new exception instance.
     *
     * @param Throwable $e
     * @param array $data
     */

    public function __construct(Throwable $e, array $data = [])
    {
        parent::__construct($e);

        $this->message = $e->getMessage();

        $this->details = $this->formatMessage($e);

        $this->data = $data;
    }

    public function render()
    {
        return response()->json(
            [
                "title" => "error",
                "message" => $this->message,
                "details" => $this->details,
                "data" => $this->data,
            ],
            422
        );
    }

    private function formatMessage(Throwable $e)
    {
        $errors = $e->validator->errors()->getMessages();

        $formattedMessages = [];

        foreach ($errors as $field => $messageArray) {
            $formattedMessages[$field] = $messageArray[0];
        }

        return $formattedMessages;
    }
}
