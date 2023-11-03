<?php

namespace App\Console\Commands;

use App\Http\Controllers\CurrencyController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class FetchExchangeRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = '';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $value = Cache::get('currency_rates');
        if (!currency_rates) {
            $value = $this->ask('Введите аббревиатуру валюты');
        }
        $getCurrencyRates =
    }
}
