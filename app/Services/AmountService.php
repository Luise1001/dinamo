<?php

namespace App\Services;

class AmountService
{
    public function format($amount)
    {
        $amount = str_replace('.', '', $amount);
        $amount = str_replace(',', '.', $amount);

        return $amount;
    }
}