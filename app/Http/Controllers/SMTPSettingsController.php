<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Config;
use App\Auth;
use App\EmailTemplate;
use App\SMTPSettings;
use Illuminate\Support\Facades\Session;

class SMTPSettingsController extends BaseController
{
    public function getView(Request $request)
    {
        $user = $request->user();
        $user_id        = $user->id;
        $smtp_setting = SMTPSettings::where('user_id', $user_id)->first();
        if ($smtp_setting == null) {
            SMTPSettings::create([
                'user_id' =>$user_id
            ]);
        }
        $email_template = EmailTemplate::where('user_id', $user_id)->first();
        if ($email_template == null) {
            EmailTemplate::create([
                'user_id' => $user_id
            ]);
        }
        $smtp_setting = SMTPSettings::where('user_id', $user_id)->first();
        $email_template = EmailTemplate::where('user_id', $user_id)->first();
        $params = [
            'data' => $smtp_setting,
            'email_template' => $email_template
        ];
        return view('pages/smtpsettings', $params);
    }

    public function updateSmtpSetting(Request $request)
    {
        $user_id = Session::get('user_id');
        $smtp_setting = SMTPSettings::where('user_id', Session::get('user_id'))->first();
        if ($smtp_setting == null) {
            return redirect()->back()->with('failed', 'smtp setting not found');
        }
        $smtp_setting->update([
            'sender_email' => $request->sender_email,
            'smtp_host' => $request->smtp_host,
            'smtp_port' => $request->smtp_port,
            'smtp_username' => $request->smtp_username,
            'smtp_password' => $request->smtp_password,
            'smtp_security' => $request->smtp_security,
            'status' => $request->status ? $request->status : false,
        ]);
        $email_template = EmailTemplate::where('user_id', $user_id)->first();
        if ($email_template == null) {
            return redirect()->back()->with('failed', 'email setting not found');
        }
        $email_template->update([
            'subject_new_invoice' => $request->subject_new_invoice,
            'body_new_invoice' => $request->body_new_invoice,
            'subject_payment_received' => $request->subject_payment_received,
            'body_payment_received' => $request->body_payment_received
        ]);
        return redirect()->back()->with('success', 'successfully updated data');
    }
}
