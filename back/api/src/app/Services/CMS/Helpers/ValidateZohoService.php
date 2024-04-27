<?php

namespace App\Services\CMS\Helpers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ValidateZohoService
{
    public function ValidateResponse($response)
    {
        if ($response['data'][0]['code'] == 'INVALID_DATA') {
            return 'Error: ' . $response['data'][0]['message'] . ', field: ' . $response['data'][0]['details']['expected_data_type'];
        }
        else if ($response['data'][0]['code'] == 'SUCCESS') {
            return $response['data'][0]['message'];
        }
        else{
            return $response['data'][0]['code'];
        }
    }


}
