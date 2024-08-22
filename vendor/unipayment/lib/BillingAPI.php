<?php
/**
 * Billing API
 */

namespace UniPayment\SDK;

use UniPayment\SDK\Model\CreateInvoiceRequest;
use UniPayment\SDK\Model\CreateInvoiceResponse;
use UniPayment\SDK\Model\GetInvoiceByIdResponse;
use UniPayment\SDK\Model\QueryInvoicesRequest;
use UniPayment\SDK\Model\QueryInvoicesResponse;
use UniPayment\SDK\Utils\JsonSerializer;

/**
 * Billing API
 */
final class BillingAPI extends BaseClient
{

    /**
     * @throws UnipaymentSDKException
     */
    public function createInvoice(CreateInvoiceRequest $createInvoiceRequest): CreateInvoiceResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/invoices';
        $response = $this->getApiClient()->post($endpoint, $headers, JsonSerializer::toJson($createInvoiceRequest));
        return JsonSerializer::fromJSON($response['response'], CreateInvoiceResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getInvoiceById(string $invoiceId): GetInvoiceByIdResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/invoices/' . $invoiceId;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], GetInvoiceByIdResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function queryInvoices(QueryInvoicesRequest $queryInvoiceRequest): QueryInvoicesResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/invoices?' . $queryInvoiceRequest;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], QueryInvoicesResponse::class);
    }
}