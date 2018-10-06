<?php

namespace App\Http\Requests;

trait PublicRequest
{
    public function authorize(): bool
    {
        return true;
    }
}
