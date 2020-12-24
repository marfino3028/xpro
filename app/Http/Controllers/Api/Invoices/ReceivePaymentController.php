<?php

namespace App\Http\Controllers\Api\Invoices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\ReceivePayment;
use Illuminate\Routing\Controller as BaseController;

class ReceivePaymentController extends BaseController
{
    //
    public function getReceivePayment(Request $request)
    {
        
    }

    public function ReceivePayment(Request $request)
    {
        try {
        $user = $request->user();
        $data = $request->data;
        $invoice = Invoice::where('id', $data['invoice_id'])->first();
        if ($invoice == null) {
            return json_encode([
                'success' => false,
                'message' => 'Invoice not found'
            ]);
        }
        if ($invoice->remaining_amount == "0") {
            return json_encode([
                'success' => false,
                'message' => 'Can\'t receive payment because your remaining amount is 0'
            ]);
        }
        if ($data['amount'] > $invoice->remaining_amount) {
            return json_encode([
                'success' => false,
                'message' => 'cannot exceed the remaining current amount'
            ]);
        }
        $status = 7;
        $remaining_amount = $invoice->remaining_amount - $data['amount'];
        if ($remaining_amount == 0) {
            $status = 3;
        }
        $invoice->update([
            'remaining_amount' => $remaining_amount,
            'status' => $status
        ]);
        ReceivePayment::create([
            'user_id' => $user->id,
            'amount' => $data['amount'],
            'type_account' => $data['type_account'],
            'invoice_id' => $data['invoice_id'],
            'received_at' => $data['received_at'],
            'note' => $data['note']
        ]);
        return json_encode([
            'success' => true,
            'message' => 'Payment received successfully'
        ]);
        } catch (\Throwable $th) {
            error_log($th);
            return json_encode([
                'success' => false,
                'message' => 'Internal server errors'
            ]);
        }
        
    }
}
