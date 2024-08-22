<?php

namespace UniPayment\SDK;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;

class ApiClient
{
    private string $userAgent = 'unipayment_sdk_php/2.0.0';
    /**
     * @var Configuration
     */
    protected Configuration $config;

    public function __construct(Configuration $configuration)
    {
        $this->config = $configuration;
    }

    /**
     * @throws UnipaymentSDKException
     */
    private function request($method, $endpoint, $headers = null, $body = null, $formParams = null): array
    {
        $options = [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => $this->userAgent
            ]
        ];

        if ($headers) {
            // Merge headers
            $mergedHeaders = array_merge($options['headers'], $headers);

            // Update options with merged headers
            $options['headers'] = $mergedHeaders;
        }

        if ($body) {
            $options['json'] = json_decode($body, true);
        }

        if ($formParams) {
            $options['form_params'] = $formParams;
        }

        try {
            $client = new Client(['base_uri' => $this->config->getHost()]);
            $response = $client->request($method, $endpoint, $options);
            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
            $json = json_decode($body, true);
            if ($statusCode >= 200 && $statusCode < 300) {
                return [
                    'status_code' => $statusCode,
                    'response' => $body,
                ];
            }
            throw new UnipaymentSDKException($json['error'], $statusCode);
        } catch (RequestException|GuzzleException $e) {
            $statusCode = $e->getCode();
            if ($e->hasResponse()) {
                $response = $e->getResponse();
                $statusCode = $response->getStatusCode();
                $body = $response->getBody()->getContents();
                $json = json_decode($body, true);
                if ($json['error']) {
                    throw new UnipaymentSDKException($json['error'], $statusCode);
                }
            }
            throw new UnipaymentSDKException($e->getMessage(), $statusCode);
        }
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function get($endpoint, $headers = null): array
    {
        return $this->request('GET', $endpoint, $headers);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function post($endpoint, $headers = null, $body = null, $fomParams = null): array
    {
        return $this->request('POST', $endpoint, $headers, $body, $fomParams);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function put($endpoint, $headers = null, $body = null,): array
    {
        return $this->request('PUT', $endpoint, $headers, $body);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function delete($endpoint, $headers = null, $body = null,): array
    {
        return $this->request('DELETE', $endpoint, $headers, $body);
    }
}