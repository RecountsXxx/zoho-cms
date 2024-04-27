<?php

namespace App\Services\CMS\Helpers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class AccessTokenService
{
    public function getAccessToken()
    {
        $clientId = env("ZOHO_CLIENT_ID");
        $clientSecret = env("ZOHO_CLIENT_SECRET");
        $accountUrl = env("ZOHO_ACCOUNT_URL");
        $code = env("ZOHO_CLIENT_CODE"); // для первого запуска ZOHOCRM.modules.ALL для self client я не нашёл способ как его получить

        $accessToken = Cache::get('zoho_access_token');
        $refreshToken = Cache::get('zoho_refresh_token');

        if (!$accessToken || !$refreshToken || $this->isAccessTokenExpired($accessToken)) {
            $client = new Client();

            if ($this->isAccessTokenExpired($accessToken) && $refreshToken) {
                $response = $client->post($accountUrl . '/oauth/v2/token', [
                    'form_params' => [
                        'refresh_token' => $refreshToken,
                        'client_id' => $clientId,
                        'client_secret' => $clientSecret,
                        'grant_type' => 'refresh_token'
                        ]
                ]);
            } else {
                $response = $client->post($accountUrl . '/oauth/v2/token', [
                    'form_params' => [
                        'code' => $code,
                        'client_id' => $clientId,
                        'client_secret' => $clientSecret,
                        'grant_type' => 'authorization_code'
                    ]
                ]);
            }

            $tokens = json_decode($response->getBody()->getContents(), true);

            if (array_key_exists('access_token', $tokens) && array_key_exists('refresh_token', $tokens)) {
                Cache::put('zoho_access_token', ['access_token'=>$tokens['access_token'], 'expires_in'=>$tokens['expires_in'] + time()], $tokens['expires_in']);
                Cache::put('zoho_refresh_token', $tokens['refresh_token']);
            }
            else if (array_key_exists('error', $tokens)) {
                return 'error';
            }
            return $tokens['access_token'];
        }


        return $accessToken['access_token'];
    }

    private function isAccessTokenExpired($accessToken)
    {
        if (isset($accessToken['expires_in'])) {
            $expireTime = $accessToken['expires_in'];
            return $expireTime <= time();
        }
        return true;
    }


}
