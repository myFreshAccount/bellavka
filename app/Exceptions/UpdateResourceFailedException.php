<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UpdateResourceFailedException extends Exception
{
    protected $code = Response::HTTP_EXPECTATION_FAILED;
    protected $message = 'Failed to update Resource.';
}
