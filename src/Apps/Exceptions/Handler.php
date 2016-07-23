<?php
namespace Apps\Exceptions;

use Cygnite\Exception\ExceptionHandler;

class Handler extends ExceptionHandler
{

    /**
     * @param Exception $e
     * @return mixed
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * @param $request
     * @param Exception $e
     * @return mixed
     */
    public function render($request, Exception $e)
    {
        return parent::render($request, $e);
    }
}
