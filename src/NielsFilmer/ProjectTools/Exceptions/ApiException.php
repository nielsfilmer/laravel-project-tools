<?php
/**
 * app/Exceptions/ApiException.php
 * @author Niels Filmer
 */

namespace NielsFilmer\ProjectTools\Exceptions;

use Illuminate\Contracts\Support\MessageBag;

/**
 * An Exception class to be handled for API errors
 * @package AngryMen\Exceptions
 */
class ApiException extends \Exception {

    /**
     * An instance of the Laravel MessageBag driver
     *
     * @var MessageBag
     */
    protected $bag;

    /**
     * Creates a new instance
     *
     * @param string $message
     * @param int $code
     * @param MessageBag $bag
     * @param \Exception $previous
     */
    public function __construct($message = "", $code = 400, MessageBag $bag = null, \Exception $previous = null)
    {
        $this->bag = $bag;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Getter for the MessageBag attribute
     *
     * @return MessageBag
     */
    public function getMessageBag()
    {
        return $this->bag;
    }

}