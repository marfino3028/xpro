<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use App\WorkOrderSettings;
use App\Models\WorkOrderSettings AS WorkOrderSettingsModels;
use App\TaxSettings;
class WorkOrderSettingsController extends BaseController
{
    public function getView(Request $request)
    {
        $data = WorkOrderSettingsModels::where('user_id', Session::get('user_id'))->first();
        if ($data == null) {
            $data = WorkOrderSettingsModels::create([
                'user_id' => Session::get('user_id')
            ]);
        }
        $data = WorkOrderSettingsModels::where('user_id', Session::get('user_id'))->first();

        $params = [
            'data' => $data,
            'tax' => TaxSettings::all()
        ];
        return view('pages/workordersettings-1', $params);
    }


    public function updateGeneralWorkOrderSettings(Request $request)
    {
        $work_setting = WorkOrderSettingsModels::where('id', $request->id)->first();
        if ($work_setting == null) {
            return redirect()->back()->with('failed', 'data not found');
        }
        $work_setting->update([
            'disable_footer' => $request->disable_footer ? $request->disable_footer : false
        ]);
        return redirect()->back()->with('update', 'updated data successfully');
    }
}
