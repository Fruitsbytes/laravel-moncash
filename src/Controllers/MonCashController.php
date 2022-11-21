<?php

namespace FruitsBytes\Laravel\MonCash\Controllers;

use Exception;
use FruitsBytes\Laravel\MonCash\Facades\APIFacade;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class MoncashController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function pay(Request $req): RedirectResponse
    {
        $amount  = (int) $req->input('amount', 0);
        $orderId = (string) $req->input('orderId', '');

        if ($amount <= 0) {
            return $this->sendError(__('payment.sending-bad-amount', ["amount" => $amount]));
        }

        try {
            return redirect()->away(APIFacade::createPayement($amount, $orderId));
        } catch (Exception $e) {
            return $this->sendError($e->getMessage());
        }
    }

    public function alert(Request $req): JsonResponse
    {
        $transactionId = $req->input('transactionId');
        // --> Do something with the confirmation from the server
        // TODO
        // <--
        return response()->json([
            'OK'            => '200',
            "transactionId" => $transactionId
        ]);
    }

    public function return(Request $req): RedirectResponse
    {
        $transactionId = $req->input('transactionId');

        return $this->sendSuccess($transactionId);
    }

    private function sendError(string $errorMessage = '')
    {
        return redirect()
            ->route('mon-cash.error')
            ->with(["mon-cash.error.message" => __("payment.could-not-create")."\r\n  $errorMessage"]);
    }

    private function sendSuccess(string $transactionId = '')
    {
        return redirect()
            ->route("mon-cash.success")
            ->with([
                "mon-cash.success.message" => __(
                    'payment.processed',
                    ["transactionId" => $transactionId]
                )
            ]);
    }


}
