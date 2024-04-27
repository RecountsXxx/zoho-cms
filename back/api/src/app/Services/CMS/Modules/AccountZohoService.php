<?php

namespace App\Services\CMS\Modules;

use App\Services\CMS\Helpers\AccessTokenService;
use App\Services\CMS\Helpers\ValidateZohoService;
use Illuminate\Support\Facades\Http;

class AccountZohoService
{
    public function __construct(private AccessTokenService $tokenService,private ValidateZohoService $validateZohoService){}

    public function insertAccount($data)
    {
        $accessToken = $this->tokenService->getAccessToken();

        $url = 'https://www.zohoapis.eu/crm/v2/accounts';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json'
        ])->post($url, [
            'data' => [
                [
                    'Account_Name' => $data['accountName'],
                    'Website' => $data['accountWebsite'],
                    'Phone' => $data['accountPhone'],
                ]
            ]
        ]);

        return $this->validateZohoService->ValidateResponse($response);
    }
}
