<?php

namespace App\Http\Interfaces;

interface ExchangeClientInterface
{
    public function getData(string $path, array $params = []): array;
}
