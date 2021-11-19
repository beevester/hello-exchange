<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ExchangeClientInterface;
use Illuminate\Http\JsonResponse;

class ExchangeRateController extends Controller
{
    private ExchangeClientInterface $client;

    public function __construct(ExchangeClientInterface $client)
    {
        $this->client = $client;
    }

    public function getRates(): JsonResponse
    {
        // Api is locked to EUR as base on free package
        $data = $this->client->getData('/latest');
        $currencies = new Currency();

        $rates = array_filter($data['rates'], function($item) use ($currencies) {
            return $currencies->isAllowableCurrency($item);
        }, ARRAY_FILTER_USE_KEY);

        return response()->json([
            'rates' => $rates
        ]);
    }

    public function exchangeRate(): JsonResponse
    {
        $from = request()->from;
        $to = request()->to;

        if ($from === $to) {
            return response()->json([
                "success" => true,
                "base" => "EUR",
                "rates" => [
                       $from => 1.0,
                       $to => 1.0
                    ]
                ]
            );
        }

        $symbols = is_string($to) ? $to : implode(',', $to);
        $params = ['base' => $from, 'symbols' => $symbols];
        $result = $this->client->getData('/latest', $params);

        return response()->json($result);
    }
}
