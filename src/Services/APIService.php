<?php

namespace FruitsBytes\Laravel\MonCash\Services;

use FruitsBytes\Laravel\MonCash\Exception;
use FruitsBytes\Laravel\MonCash\Facades\HTTPFacade;
use FruitsBytes\Laravel\MonCash\Models\Payment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Str;


define(
    'HOST_REST_API',
    config('moncash.mode') === 'production' ?
        'https://moncashbutton.digicelgroup.com/Api' :
        'https://sandbox.moncashbutton.digicelgroup.com/Api'
);

define(
    'GATEWAY_BASE',
    config('moncash.mode') === 'production' ?
        'https://moncashbutton.digicelgroup.com/Moncash-middleware' :
        'https://sandbox.moncashbutton.digicelgroup.com/Moncash-middleware'
);

class APIService
{


    /**
     * @param  int  $amount
     *
     * @param  string|null  $orderId
     *
     * @return string
     * @throws Exception
     */
    public function createPayement(int $amount, ?string $orderId): string
    {
        if (empty($orderId)) {
            $orderId = (string)Str::uuid();
        }
        try {
            $reponse = HTTPFacade::postJson(
                '/v1/CreatePayment',
                json_encode([
                        "orderId" => $orderId, "amount" => $amount
                    ]
                )
            );
            $reponse->throw();

            // TODO re-use token if noting changed and it is still valid
            return GATEWAY_BASE.'/Payment/Redirect?token='.$reponse['payment_token']['token'];
        } catch (\Exception $e) {
            throw new Exception('Could not create payment', 0, $e);
        }
    }

    /**
     * @param  string  $orderId
     *
     * @return Payment
     * @throws RequestException | ModelNotFoundException<Payment>
     */
    public function getOrder(string $orderId): Payment
    {
        $response = $this->getRawOrder($orderId);

        $response->throw();

        return $this->rawToPayment($response);
    }

    /**
     * @param  string|int  $transactionId
     *
     * @return Payment
     * @throws RequestException
     */
    public function getTransaction(string|int $transactionId): Payment
    {
        $response = $this->getRawTransaction($transactionId);
        $response->throw();

        return $this->rawToPayment($response);
    }

    public function rawToPayment(Response $response): Payment
    {
        $payment                = new Payment();
        $payment->payer         = $response['payment']['payer'];
        $payment->transactionID = $response['payment']['transaction_id'];
        $payment->orderID       = $response['payment']['reference'];
        $payment->cost          = $response['payment']['cost'];
        $payment->message       = $response['payment']['message'];

        return $payment;
    }

    public function getRawTransaction(string|int $transactionId): Response
    {
        return HTTPFacade::postJson(
            '/v1/RetrieveTransactionPayment',
            json_encode([
                    "transactionId" => $transactionId
                ]
            )
        );
    }

    public function getRawOrder(string|int $orderId): Response
    {
        return HTTPFacade::postJson(
            '/v1/RetrieveOrderPayment',
            json_encode([
                    "orderId" => $orderId
                ]
            )
        );
    }

}
