<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Auth;
use App\Dashboard;
use App\Models\Invoice;
use App\Models\User;
use App\Models\InvoiceBatch;
use App\Models\InvoiceProductClient;
use App\Models\Client;
use App\Models\Product;
use App\Models\StaffTracking;
use App\Models\WorkOrder;
use App\Estimates;
use App\Models\Staff;
use App\Models\LogActivity;
use App\Charts\TrafficChart;
use DB;
class DashboardController extends BaseController
{
    public function dataGet(Request $request){
        $user = $request->user();
        $user_id        = $user->id;
        $role_id        = $user->role_id;

        // get user data

        // get menu based on role_id
        $menus = Dashboard::getMenu($role_id);
        
        foreach($menus as $menu){
            if($menu->status == 3) $singles[] = $menu;
            if($menu->status == 2) $parents[] = $menu;
            if($menu->status == 1) $subs[]    = $menu;
        }
        unset($menus);
        if(isset($singles)){
			foreach($singles as $single){
            $menus[]  = [
                'parent_code' => $single->parent_code,
                'parent_icon' => $single->icon,
                'parent_name' => $single->name,
                'sub_menu'    => [],
            ];
        	}
        }
        foreach($parents as $parent){
            foreach($subs as $sub){
                if($parent->parent_code == $sub->parent_code){
                    $childs[] = [
                        'sub_code' => $sub->code,
                        'sub_icon' => $sub->icon,
                        'sub_name' => $sub->name,
                    ];
                }
            }

            $menus[]  = [
                'parent_code' => $parent->parent_code,
                'parent_icon' => $parent->icon,
                'parent_name' => $parent->name,
                'sub_menu'    => isset($childs) ? $childs : [],
            ];
            unset($childs);
        }
        
        $showStaff      = Staff::where('email', $user->username)->get();
        session(['showStaff'    => $showStaff]);
        session(['menus'        => $menus]);

        $no = 1;
        $showClient     = Client::orderBy('id', 'asc')->get();
        $showUser       = User::where('id', $user->id)->get();
		$showProduct    = Product::orderBy('id', 'asc')->get();
        $showData       = Invoice::orderBy('inv_number', 'DESC')->with('inv_batch', 'inv_product', 'client', 'product')->limit(5)->get();
        $showDue        = Invoice::orderBy('inv_number', 'DESC')->with('inv_batch', 'inv_product', 'client', 'product')->get();
        $logActivity    = LogActivity::orderBy('on_date', 'ASC')->where('title', 'like', 'Update Work Order #W%')->get();
        $estimatesData = DB::table('x_estimates')
                        ->select('estimates_date', DB::raw('id as total'))
                        ->groupBy('estimates_date')
                        ->pluck('total', 'estimates_date')->all();

        $invoiceData = DB::table('x_new_invoice')
                        ->select('invoice_date', DB::raw('id as total'))
                        ->groupBy('invoice_date')
                        ->pluck('total', 'invoice_date')->all();

        $workOrderData = DB::table('x_work_orders')
                        ->select('workorder_date', DB::raw('id as total'))
                        ->groupBy('workorder_date')
                        ->pluck('total', 'workorder_date')->all();
                        
        $labelData = DB::table('x_estimates AS xs')
        ->join('x_new_invoice AS xn', 'xs.id_clients', 'xn.client_id')
        ->join('x_work_orders AS xw', 'xs.id_clients', 'xw.id_clients')
        ->select('xs.estimates_date', 'xn.invoice_date', 'xw.workorder_date')
        // ->groupBy('tanggal')
        ->pluck('xs.estimates_date', 'xn.invoice_date', 'xw.workorder_date')->all();
        // dd($logActivity);

        // $chart = new TrafficChart;
        // $chart->labels(array_keys($workOrderData));
        // $chart->labels(array_keys($estimatesData));
        // $chart->labels(array_keys($invoiceData));
        
        // $chart->dataset('My Estimate', 'line', array_values($estimatesData))
        //     ->color("rgb(229, 103, 23)")
        //     ->backgroundcolor("transparent");

        // $chart->dataset('My Invoice', 'line', array_values($invoiceData))
        //     ->color("#01796F")
        //     ->backgroundcolor("transparent");

        // $chart->dataset('My Work Order', 'line', array_values($workOrderData))
        //     ->color("#6030A8")
        //     ->backgroundcolor("transparent");   
        //echo json_encode($showStaff);
        return view('pages/dashboard',[
            'showUser'      => $showUser,
			'showClient'    => $showClient,
            'showData'      => $showData,
            'showDue'       => $showDue,
			'showProduct'   => $showProduct,
            'no'            => $no,
            'labelData'     => $labelData,
            'estimatesData' => array_values($estimatesData),
            'invoiceData' => array_values($invoiceData),
            'workOrderData' => array_values($workOrderData),
            'logActivity'   => $logActivity,
            'workorder_pending' => WorkOrder::where('status', 3)->count(),
            'workorder_ongoing' => WorkOrder::where('status', 5)->count(),
            'workorder_finished' => WorkOrder::where('status', 2)->count(),
            'workorder_draft' => WorkOrder::where('status', 1)->count(),
            'staff_tracking' => StaffTracking::count()
		]);
    }

    public function reg(){
        // dd('masuk_reg');
        $params = [
            'user' => 'satish@gmail.com',
            'pass' => 'test123',
        ];
        Auth::register($params);
        return 'ok';
        // return view('pages/dashboard');
    }


    public function __construct()
    {
        $this->middleware('auth');
    }
}
