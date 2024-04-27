<?php

namespace App\Services\CMS\Modules;

use App\Services\CMS\Helpers\AccessTokenService;
use App\Services\CMS\Helpers\ValidateZohoService;
use Illuminate\Support\Facades\Http;

class DealZohoService
{
    public function __construct(private AccessTokenService $tokenService,private ValidateZohoService $validateZohoService){}

    public function insertDeal($data)
    {
        $accessToken = $this->tokenService->getAccessToken();

        $url = 'https://www.zohoapis.eu/crm/v2/deals';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json'
        ])->post($url, [
            'data' => [
                [
                    'Deal_Name'=> $data['dealName'],
                    'Stage'=>$data['dealStage'],
                    'Account_Name' => $data['dealAccountName'],
                ]
            ]
        ]);

        return $this->validateZohoService->ValidateResponse($response);
    }
}
