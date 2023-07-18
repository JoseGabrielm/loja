<?php

namespace App\Classes\Validators;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ValidateRequest
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
