<?php

namespace App\Traits;
use Illuminate\Support\Str;
trait generateTraitId
{
    public function generateUniqueId()
    {
        $uniqueNumber = Str::random(5); // Generate a random string of 5 characters
        return 'TBJS-' . strtoupper($uniqueNumber);
    }
}
