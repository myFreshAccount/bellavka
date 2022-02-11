<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class LoginFailedException extends Exception
{
    protected $code = Response::HTTP_BAD_REQUEST;
    protected $message = 'Wrong login or password';
}
