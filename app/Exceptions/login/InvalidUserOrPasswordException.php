<?php

namespace App\Exceptions\login;

use Exception;
use Illuminate\Support\Facades\Log;

class InvalidUserOrPasswordException extends Exception
{
    /**
     * Report the exception.
     */
    public function report(): void
    {
        Log::error('Invalid user or password'. $this->getMessage());
    }

}
