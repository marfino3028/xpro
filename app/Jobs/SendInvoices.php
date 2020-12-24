<?php

namespace App\Jobs;

use App\CompanySettings;
use App\EmailTemplate;
use App\Mail\DBTemplateMail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Invoice;
use App\Models\InvoiceSettings;
use App\Models\ReceivePayment;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SendInvoices implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $invoice_id;
    public function __construct($invoice_id)
    {
        //
        $this->invoice_id = $invoice_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $invoice = Invoice::with(['client', 'invoiceitems.product', 'invoiceitems.tax'])->where('id', $this->invoice_id)->first();
        if ($invoice == null) return false;
        $invoice_setting = InvoiceSettings::where('user_id', $invoice->user_id)->first();
		$company_setting = CompanySettings::where('user_id', $invoice->user_id)->first();
		$params = [
			'data' => $invoice,
			'invoice_setting' => $invoice_setting,
			'company_setting' => $company_setting,
			'receive_payment' => ReceivePayment::with(['invoice'])->where('invoice_id', $invoice->id)->get()
		];
        $pdf = PDF::loadView('pages.invoice.print-invoice', $params);
        $template = EmailTemplate::where('user_id', $invoice->user_id)->first()->body_new_invoice;
        $data = [
            'template' => $template,
            'file' => $pdf->output(),
            'file_name' => $invoice->inv_number . ".pdf",
            'customer_name' => $invoice->client->customer_name,
            'invoice_number' => $invoice->inv_number,
            'invoice_link' => URL::to('/') . '/manage_invoice/detail/' . $invoice->id
        ];
        Mail::to($invoice->client->email)->send(new DBTemplateMail($data));
        return true;
    }
}
