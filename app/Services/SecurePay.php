<?php

namespace App\Services;

use GuzzleHttp\Client;

class SecurePay
{

    protected $http;

    public function __construct(Client $client)
    {
        $this->http = $client;
    }

    public function Authentication($scope)
    {
        try {
            $request = $this->http->post(env('SECUREPAY_URL', 'https://hello.sandbox.auspost.com.au') . '/oauth2/ausujjr7T0v0TTilk3l5/v1/token', [
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
                'auth' => [
                    'username' => env('SECUREPAY_USERNAME'),
                    'password' => env('SECUREPAY_PASSWORD')
                ],
                'query' => [
                    'grant_type' => 'client_credentials',
                    'scope' => $scope
                ]
            ]);
            $response = $request ? $request->getBody()->getContents() : null;
            $status = $request ? $request->getStatusCode() : 500;
            if ($response && $status === 200 && $response !== 'null') {
                return json_decode($response)->data;
            }
            return (object) [
                'success' => false,
                'message' => 'Autentication failed'
            ];
        } catch (\Throwable $th) {
            return (object) [
                'success' => false,
                'message' => 'Autentication failed'
            ];
        }
    }
}
