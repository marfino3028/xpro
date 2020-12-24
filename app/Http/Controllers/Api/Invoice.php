<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Config;
use App\Models\Invoice as InvoiceM;
use App\Models\Product as ProductM;
use Dompdf\Dompdf;

class Invoice extends BaseController
{
    public function list(Request $request){
        $datas      = $request->input('datas');
        $list = InvoiceM::list();
        $rc = Config::getRc('XPRO_ANDROID', 00);
        $respDatas = [
            'invoice_list' => $list
        ];
        $data = [
            'rc' => $rc->code,
            'msg' => $rc->message,
            'dtime' => date('Y-m-d H:i:s'),
            'datas' => (object) $respDatas
        ];
        return response()->json($data, 200);
    }

    public function get(Request $request){
        $datas      = $request->input('datas');
        
        $id         = $datas['invoice_id'];

        $invoice = InvoiceM::get($id);

        $rc = Config::getRc('XPRO_ANDROID', 00);
        $respDatas = [
            'invoice_detail' => $invoice
        ];
        $data = [
            'rc' => $rc->code,
            'msg' => $rc->message,
            'dtime' => date('Y-m-d H:i:s'),
            'datas' => (object) $respDatas
        ];
        return response()->json($data, 200);
    }

    public function addItemQty(Request $request){
        $datas      = $request->input('datas');
        
        $ipc_id     = $datas['invoice_product_client_id'];
        $invoice_id = $datas['invoice_id'];

        ProductM::addItemQty($ipc_id, $invoice_id);
        
        $rc = Config::getRc('XPRO_ANDROID', 00);
        $respDatas = [
            'message' => "Success add product quantity"
        ];
        $data = [
            'rc' => $rc->code,
            'msg' => $rc->message,
            'dtime' => date('Y-m-d H:i:s'),
            'datas' => (object) $respDatas
        ];
        return response()->json($data, 200);
    }

    public function removeItemQty(Request $request){
        $datas      = $request->input('datas');
        
        $ipc_id     = $datas['invoice_product_client_id'];
        $invoice_id = $datas['invoice_id'];

        ProductM::removeItemQty($ipc_id, $invoice_id);

        $rc = Config::getRc('XPRO_ANDROID', 00);
        $respDatas = [
            'message' => "Success remove product quantity"
        ];
        $data = [
            'rc' => $rc->code,
            'msg' => $rc->message,
            'dtime' => date('Y-m-d H:i:s'),
            'datas' => (object) $respDatas
        ];
        return response()->json($data, 200);
    }

    public function addItem(Request $request){
        $datas      = $request->input('datas');

        $id         = $datas['invoice_id'];
        return "";
    }

    public function removeItem(Request $request){
        $datas      = $request->input('datas');

        $id         = $datas['invoice_id'];
        return "";
    }

    public function add(Request $request){
        $datas      = $request->input('datas');
        return "";
    }

    public function remove(Request $request){
        $datas      = $request->input('datas');
        return "";
    }

    public function generatePdf(Request $request){
        $datas      = $request->input('datas');

        $id         = $datas['invoice_id'];

        $filename= 'invoice_' . $id . '_' . time() . '.pdf';
        $path   = storage_path().'/generated/invoice/'.$filename;
                
        $invoice = InvoiceM::get($id);
        $this->_invoiceToPdf($path, $invoice);

        return response()->download($path);
    }

    private function _invoiceToPdf($path, $invoice){
        $dompdf = new Dompdf();

        $html = view('templates/invoice_pdf', ['invoices' => $invoice])->render();
        
        $dompdf->set_option('isFontSubsettingEnabled', 'true');
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $output = $dompdf->output();
        file_put_contents($path, $output);        
    }
}
