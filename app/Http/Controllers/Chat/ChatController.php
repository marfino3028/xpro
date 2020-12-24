<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Chat;
use App\Models\Staff;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class ChatController extends BaseController
{
    public function ChatView()
    {
        return view('pages.chat.index');
    }

    public function getMessageView(Request $request)
    {
        $user       = $request->user();
        $showStaff  = Staff::where('status', 1)->where('id','<>', $user->id)->get();
        return view('pages.chat.message',['showStaff' => $showStaff]);
    }

    public function getMessageChat(Request $request)
    {
        $staff_id   = $request->id_staff;
        $dataStaff  = Staff::where('status', 1)->where('id', $staff_id)->first();
        
        $dataTo     = Chat::with(['staff'])->where('to_user', $staff_id)->get();
        $dataFrom   = Chat::with(['staff'])->where('from_user', $staff_id)->get();
        return view('pages.chat.chat',[
            'staff_id'  => $staff_id, 
            'dataStaff' => $dataStaff,
            'dataFrom'  => $dataFrom,
            'dataTo'    => $dataTo,
            ]);
    }
    
    public function getMessageReplay(Request $request)
    {
        $user       = $request->user();
        $staff_id   = $request->to_user;

        $message    = Chat::create([
            'from_user'     => $user->id,
            'to_user'       => $request->to_user,
            'message'       => $request->message,
            'created_at'    => Carbon::now(),
        ]);
        

        $dataStaff  = Staff::where('status', 1)->where('id', $staff_id)->first();
        $dataTo     = Chat::with(['staff'])->where('to_user', $staff_id)->get();
        $dataFrom   = Chat::with(['staff'])->where('from_user', $staff_id)->get();
        
        return view('pages.chat.chat',[
            'dataStaff' => $dataStaff,
            'dataFrom'  => $dataFrom,
            'dataTo'    => $dataTo,
        ]);
    }
}
