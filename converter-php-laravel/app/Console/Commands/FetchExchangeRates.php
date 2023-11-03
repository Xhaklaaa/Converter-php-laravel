<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FetchExchangeRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-exchange-rates';

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
        return Cache::remember('currency_rates', now()->addHours(1), function () {

            $response = Http::get('http://www.cbr.ru/scripts/XML_daily.asp');

            if ($response->successful()) {
                $xml = simplexml_load_string($response->body());
                $currencies = [];

                foreach ($xml->Valute as $valute) {
                    $code = (string)$valute->CharCode;
                    $rate = str_replace(',', '.', (string)$valute->Value);
                    $currencies[] = [
                        'currency_code' => $code,
                        'rate' => $rate,
                    ];
                }

                return $currencies;
            }

            return [];
        });
    }
}
