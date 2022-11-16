<?php

namespace App\Exceptions;

use Exception;

class NotCompletedException extends Exception
{
    public function render($request)
    {
        return response()->view('no_method', [],501);
    }
}
