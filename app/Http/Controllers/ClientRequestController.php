<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ExchangeClientInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ClientRequestController extends Controller implements ExchangeClientInterface
{
    /**
     * @param string $path
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function getData(string $path , array $params = []): array
    {
        $url = sprintf("%s%s?access_key=%s", config('exchange.base_url'), $path, config('exchange.api_key'));

        foreach ($params as $param => $value) {
            $url .= '&'.urlencode($param).'='.urlencode($value);
        }

        $client = new Client();

        return json_decode($client->get($url)->getBody()->getContents(), true);
    }
}
