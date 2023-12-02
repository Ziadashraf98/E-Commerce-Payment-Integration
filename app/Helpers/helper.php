<?php

use App\Models\Currency;

function getCurrency()
{
    $currency = Currency::where('status', 1)->first()->code;
    return $currency;
}