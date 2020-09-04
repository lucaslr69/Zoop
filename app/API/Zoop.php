<?php

namespace App\API;

class Zoop
{

    private $configuration;

    private $connection;

    public function __construct($marketplace, $token, $seller)
    {
        $this->configuration = [
            'marketplace' => $marketplace,
            'gatway' => 'zoop',
            'base_url' => 'https://api.zoop.ws',
            'auth' => [
                'on_behalf_of' => $seller,
                'token' => $token,
            ],
            'configurations' => [
                'limit' => 20,
                'sort' => 'time-descending',
                'offset' => 0,
                'date_range' => null,
                'date_range[gt]' => null,
                'date_range[gte]' => null,
                'date_range[lt]' => null,
                'date_range[lte]' => null,
                'reference_id' => null,
                'status' => null,
                'payment_type' => null,
            ],
            'guzzle' => [
                'base_uri' => 'https://api.zoop.ws',
                'timeout' => 10,
                'headers' => [
                    'Authorization' => 'Basic ' . \base64_encode($token . ':'),
                ],
            ],
        ];

        $this->connection = new \GuzzleHttp\Client($this->configuration['guzzle']);

    }

    
    

    public function createSellerPf(array $user)
    {
        try {
            $request = $this->connection->request('POST', '/v1/marketplaces/' . $this->configuration['marketplace'] . '/sellers/individuals', ['json' => $user]);
            $response = \json_decode($request->getBody()->getContents(), true);

            if ($response && is_array($response)) {
                return $response;
            }

            return false;
        } catch (\Exception $e) {
            return $this->ResponseException($e);
        }
    }


    public function createSellerPj(array $user)
    {
        try {
            $request = $this->connection->request('POST', '/v1/marketplaces/' . $this->configuration['marketplace'] . '/sellers/businesses', ['json' => $user]);
            $response = \json_decode($request->getBody()->getContents(), true);

            if ($response && is_array($response)) {
                return $response;
            }

            return false;
        } catch (\Exception $e) {
            return $this->ResponseException($e);
        }
    }

    public function ResponseException(\Exception $e)
    {
        if (!in_array('getResponse', \get_class_methods($e))) {
            throw new \Exception($e->getMessage(), 1);
        }
        throw new \Exception(\json_encode(\json_decode($e->getResponse()->getBody()->getContents(), true)), 1);
    }
}
