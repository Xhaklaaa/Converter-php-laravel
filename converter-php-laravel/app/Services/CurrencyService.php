<?php

namespace App\Services;

class CurrencyService
{
    public function getCurrencyRates()
    {
        // Ваша логика для получения курсов валют
        return [
            ['currency_code' => 'USD', 'rates' => 1.2],
            ['currency_code' => 'EUR', 'rates' => 1.5],
            // Другие курсы валют
        ];
    }
}
