<?php
namespace Apps\Exceptions;

use Cygnite\Exception\ExceptionHandler;

/**
 * Class Handler.
 * @package Apps\Exceptions
 */
class Handler extends ExceptionHandler
{
    /**
     * Throws exceptions in development environment.
     *
     * @param \Exception $e
     * @throws \Exception
     */
    public function report($e)
    {
        throw $e;
    }

    /**
     * Render error view page in production mode.
     * Log the error.
     *
     * @param \Exception $e
     * @return mixed
     */
    public function render($e)
    {
        /**
         * We will log exception if logger enabled.
         */
        if ($this->isLoggerEnabled()) {
            $this->log($e);
        }

        $this->renderErrorPage($e);
    }
}
