<?php

namespace App\Http\Controllers\Invoices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CreditNotes;
use App\Models\Invoice;
use App\Models\LogActivity;
use App\Models\ReceivePayment;
use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;

class ReceivePaymentController extends BaseController
{
    //
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
        $status = 7;
        $remaining_amount = $invoice->remaining_amount - $data['amount'];
        $outstanding_balance = 0;
        if ($remaining_amount <= 0) {
            $status = 3;
            $remaining_amount = 0;
            $outstanding_balance = $data['amount'] - $invoice->remaining_amount;
            if ($outstanding_balance > 0) {
                $status = 6;
                CreditNotes::create([
                    'id_clients' => $invoice->client_id,
                    'id_product' => 1,
                    'start_date' => Carbon::now(),
                    'issue_date' => Carbon::now(),
                    'payment_terms' => 1,
                    'quantity' => 1,
                    'notes' => 'overpaid of $' . $outstanding_balance,
                    'status' => 1,
                    'paid_date' => $invoice->paid_date,
                ]);
            } 
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
        LogActivity::create([
			'user_id' => $user->id,
			'title' => 'Receive Payment $'. $data['amount'] .' invoices ' . $invoice->inv_number,
			'note' => 'Receive Payment $'. $data['amount'] .' invoices ' . $invoice->inv_number,
			'action_by' => $user->username,
			'on_date' => Carbon::now(),
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
