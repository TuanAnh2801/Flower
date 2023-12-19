<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailtoUserSubcribe;
use App\Models\User_Subcribe;
use Illuminate\Support\Facades\DB;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $contents;

    public function __construct($contents)
    {
        $this->contents = $contents;
    }

    public function handle()
    {
        $users = User_Subcribe::all();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new SendMailtoUserSubcribe($this->contents));
        }
    
    
    }
}