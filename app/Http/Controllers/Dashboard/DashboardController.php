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
use App\Models\Staff;
use App\Estimates;
use Charts;
use App\Charts\TrafficChart;
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
        $calcEstimates  = Estimates::groupBy('estimates_date')->count('id');
        $disEstimates   = Estimates::orderBy('estimates_date', 'ASC')->get('estimates_date')->pluck('estimates_date');
        $calcWorkOrder  = WorkOrder::groupBy('workorder_date')->count('id');
        $disWorkOrder   = WorkOrder::orderBy('workorder_date', 'ASC')->get('workorder_date')->pluck('workorder_date');
        $calcInvoice  = Invoice::groupBy('invoice_date')->count('id');
        $disInvoice   = Invoice::orderBy('invoice_date', 'ASC')->get('invoice_date')->pluck('invoice_date');
        $chart = new TrafficChart;
        $chart->labels = (array_keys($disEstimates, $disWorkOrder, $disInvoice));
        $chart->dataset = (array_values($calcEstimates, $calcWorkOrder, $calcInvoice));
        //echo json_encode($showStaff);
        return view('pages/dashboard',[
            'showUser'      => $showUser,
			'showClient'    => $showClient,
            'showData'      => $showData,
            'showDue'       => $showDue,
			'showProduct'   => $showProduct,
            'no'            => $no,
            'chart'         => $chart,
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
