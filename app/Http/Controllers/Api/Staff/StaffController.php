<?php

namespace App\Http\Controllers\Api\Staff;

use App\Models\ManageStaffMembersModels;
use App\Models\StaffTracking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class StaffController extends BaseController
{
    //
    public function getStaff(Request $request)
    {
        try {
            $user = $request->user();
            $data = ManageStaffMembersModels::get();
            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'messsage' => 'Internal server error'
            ]);
        }
    }

    public function updateLocationStaff(Request $request)
    {
        try {
            $user = $request->user();
            $staff = StaffTracking::where('staff_id', $user->id)->first();
            if ($staff == null) {
                StaffTracking::create([
                    'staff_id' => $user->id,
                    'longtitude' => $request->longtitude,
                    'latitude' => $request->latitude,
                    'status' => $request->status
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'Location updated'
                ]);
            }
            $staff->update([
                'staff_id' => $user->id,
                'longtitude' => $request->longtitude,
                'latitude' => $request->latitude,
                'status' => $request->status
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Location updated'
            ]);
        } catch (\Throwable $th) {
            error_log($th);
            return response()->json([
                'success' => false,
                'messsage' => 'Internal server error'
            ]);
        }
    }
}
