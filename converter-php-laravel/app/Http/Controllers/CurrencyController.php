<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\CurrencyRate;
use SimpleXMLElement;
use Illuminate\Support\Facades\Cache;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = $this->getCurrencyRates();

        return view('index', compact('currencies'));
    }

    protected function getCurrencyRates()
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

    public function convert(Request $request)
    {
        $this->validate($request, [
            'amount' => 'numeric|min:0',
            'from' => 'required',
            'to' => 'required',
        ]);

        $from_currency = $request->from;
        $to_currency = $request->to;

        if ($from_currency === $to_currency) {
            return back()->with('conversion', 'The source and destination currencies must be different.');
        }

        $currencies = $this->getCurrencyRates();

        $from_rate = $to_rate = 1.0;

        foreach ($currencies as $currency) {
            if ($currency['currency_code'] === $from_currency) {
                $from_rate = $currency['rate'];
            } elseif ($currency['currency_code'] === $to_currency) {
                $to_rate = $currency['rate'];
            }
        }

        $amount = $request->amount;
        $convertedAmount = round((($amount / $to_rate) * $from_rate), 2);

        return back()->with([
            'conversion' => $amount . ' ' . $request->from . ' ' . 'is equal to' . ' ' . $convertedAmount . ' ' . $request->to
        ]);
    }
}
