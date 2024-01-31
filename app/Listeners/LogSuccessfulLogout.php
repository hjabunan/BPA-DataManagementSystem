<?php

namespace App\Listeners;

use App\Models\LoginLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $user = $event->user;
        
        if ($user) {
            LoginLog::create([
                'login_username' => $user->idnum,
                'login_time' => now(),
                'login_ipaddress' => request()->ip(),
                'login_eventtype' => 'logout',
                'login_status' => 'sucess',
                'failure_reason' => '',
            ]);
        }
    }
}
