<?php

namespace App\Services;

use Illuminate\Support\Str;

class RegisterMacros
{
    public function titleToUpper()
    {
        return function () {
            return $this->map(function ($value) {
                if ($value->title) {
                    $value->title =  Str::upper($value->title);
                }
                return $value;
            });
        };
    }
}
