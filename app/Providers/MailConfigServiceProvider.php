<?php

namespace App\Providers;

use App\SMTPSettings;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $smtp = SMTPSettings::where('user_id', Session::get('user_id'))->first();
        if ($smtp) {
            $config = array(
                'driver'     => 'smtp',
                'host'       => $smtp->smtp_host,
                'port'       => $smtp->smtp_port,
                'from'       => array('address' => $smtp->sender_email, 'name' => $smtp->from_name),
                'encryption' => $smtp->smtp_security,
                'username'   => $smtp->smtp_username,
                'password'   => $smtp->smtp_password,
                'sendmail'   => '/usr/sbin/sendmail -bs',
                'pretend'    => false,
            );
            Config::set('mail', $config);
        }
    }
}
