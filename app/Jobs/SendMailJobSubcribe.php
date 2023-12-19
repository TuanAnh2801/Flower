<?php

namespace App\Jobs;

use App\Mail\SendMailtoUserSubcribe;
use App\Models\User_Subcribe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJobSubcribe implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $contents;
    public function __construct($contents)
    {
        $this->contents = $contents ;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $contents = $this->contents;
        $users = User_Subcribe::all();
    
        foreach ($users as $user) {
            Mail::to($user->email)->send(new SendMailtoUserSubcribe($contents));
            // sleep(60);
        }
    //  return Mail::to($this->email)->send(new SendMailtoUserSubcribe($this->email));
    }
}
