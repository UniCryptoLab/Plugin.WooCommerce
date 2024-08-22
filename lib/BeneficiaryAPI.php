<?php
/**
 * Beneficiary API
 */

namespace UniPayment\SDK;

use UniPayment\SDK\Model\BankPaymentMethodDetail;
use UniPayment\SDK\Model\Beneficiary;
use UniPayment\SDK\Model\BeneficiaryResponse;
use UniPayment\SDK\Model\CryptoPaymentMethodDetail;
use UniPayment\SDK\Model\GetPaymentMethodListResponse;
use UniPayment\SDK\Model\InternalPaymentMethodDetail;
use UniPayment\SDK\Model\PaymentMethod;
use UniPayment\SDK\Model\PaymentMethodDetail;
use UniPayment\SDK\Model\PaymentMethodResponse;
use UniPayment\SDK\Model\QueryBeneficiaryRequest;
use UniPayment\SDK\Model\QueryBeneficiaryResponse;
use UniPayment\SDK\Model\TransferMethod;
use UniPayment\SDK\Utils\JsonSerializer;

/**
 * Beneficiary API
 */
final class BeneficiaryAPI extends BaseClient
{
    /**
     * @throws UnipaymentSDKException
     */
    public function createBeneficiary(Beneficiary $beneficiary): BeneficiaryResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/beneficiaries';
        $response = $this->getApiClient()->post($endpoint, $headers, JsonSerializer::toJson($beneficiary));
        return JsonSerializer::fromJSON($response['response'], BeneficiaryResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getBeneficiaryById(string $beneficiaryId): BeneficiaryResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/beneficiaries/' . $beneficiaryId;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], BeneficiaryResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function updateBeneficiary(string $beneficiaryId, Beneficiary $beneficiary): BeneficiaryResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/beneficiaries/' . $beneficiaryId;
        $response = $this->getApiClient()->put($endpoint, $headers, JsonSerializer::toJson($beneficiary));
        return JsonSerializer::fromJSON($response['response'], BeneficiaryResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function deleteBeneficiary(string $beneficiaryId): BeneficiaryResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/beneficiaries/' . $beneficiaryId;
        $response = $this->getApiClient()->delete($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], BeneficiaryResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function queryBeneficiaries(QueryBeneficiaryRequest $queryBeneficiaryRequest): QueryBeneficiaryResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/beneficiaries?' . $queryBeneficiaryRequest;
        $response = $this->getApiClient()->get($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], QueryBeneficiaryResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function createPaymentMethod(string $beneficiaryId, PaymentMethod $paymentMethod): PaymentMethodResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/beneficiaries/' . $beneficiaryId . '/payment-methods';
        $response = $this->getApiClient()->post($endpoint, $headers, JsonSerializer::toJson($paymentMethod));
        return JsonSerializer::fromJSON($response['response'], PaymentMethodResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getPaymentMethodById(string $beneficiaryId, string $paymentMethodId): PaymentMethodResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/beneficiaries/' . $beneficiaryId . '/payment-methods/' . $paymentMethodId;
        $response = $this->getApiClient()->get($endpoint, $headers);

        /** @var PaymentMethodResponse $paymentMethodResponse */
        $paymentMethodResponse = JsonSerializer::fromJSON($response['response'], PaymentMethodResponse::class);
        $paymentMethod = $paymentMethodResponse->getData();

        $data = json_decode($response['response'], true)['data'];
        $detail = $data['detail'];
        $detailJson = json_encode($detail);
        $paymentMethod->setDetail($this->getPaymentMethodDetail($paymentMethod->getTransferMethod(), $detailJson));

        return $paymentMethodResponse;
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function updatePaymentMethod(string $beneficiaryId, string $paymentMethodId, PaymentMethod $paymentMethod): PaymentMethodResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/beneficiaries/' . $beneficiaryId . '/payment-methods/' . $paymentMethodId;
        $response = $this->getApiClient()->put($endpoint, $headers, JsonSerializer::toJson($paymentMethod));
        return JsonSerializer::fromJSON($response['response'], PaymentMethodResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function deletePaymentMethod(string $beneficiaryId, string $paymentMethodId): PaymentMethodResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/beneficiaries/' . $beneficiaryId . '/payment-methods/' . $paymentMethodId;
        $response = $this->getApiClient()->delete($endpoint, $headers);
        return JsonSerializer::fromJSON($response['response'], PaymentMethodResponse::class);
    }

    /**
     * @throws UnipaymentSDKException
     */
    public function getPaymentMethodList(string $beneficiaryId): GetPaymentMethodListResponse
    {
        $accessToken = $this->getAccessToken();
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken
        ];
        $endpoint = 'v' . $this->getConfiguration()->getApiVersion() . '/beneficiaries/' . $beneficiaryId . '/payment-methods';
        $response = $this->getApiClient()->get($endpoint, $headers);

        /** @var GetPaymentMethodListResponse $getPaymentMethodListResponse */
        $getPaymentMethodListResponse = JsonSerializer::fromJSON($response['response'], GetPaymentMethodListResponse::class);
        $dataArray = json_decode($response['response'], true)['data'];
        $i = 0;
        foreach ($getPaymentMethodListResponse->getData() as &$paymentMethod) {
            $detail = $dataArray[$i]['detail'];
            $detailJson = json_encode($detail);
            $paymentMethodDetail = $this->getPaymentMethodDetail($paymentMethod->getTransferMethod(), $detailJson);
            $paymentMethod->setDetail($paymentMethodDetail);
            $i++;
        }
        return $getPaymentMethodListResponse;
    }

    /**
     * @throws UnipaymentSDKException
     */
    private function getPaymentMethodDetail(string $transferMethod, string $detailJson): PaymentMethodDetail
    {
        $paymentMethodDetail = null;
        if (TransferMethod::BANK == $transferMethod) {
            $paymentMethodDetail = JsonSerializer::fromJSON($detailJson, BankPaymentMethodDetail::class);
        } else if (TransferMethod::CRYPTO == $transferMethod) {
            $paymentMethodDetail = JsonSerializer::fromJSON($detailJson, CryptoPaymentMethodDetail::class);
        } else if (TransferMethod::INTERNAL == $transferMethod) {
            $paymentMethodDetail = JsonSerializer::fromJSON($detailJson, InternalPaymentMethodDetail::class);
        }
        return $paymentMethodDetail;
    }
}