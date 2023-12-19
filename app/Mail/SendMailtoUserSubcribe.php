<?php

namespace App\Mail;

use App\Models\TextMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class SendMailtoUserSubcribe extends Mailable
{
    use Queueable, SerializesModels;
    public $latestText;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($latestText)
    {
        $this->latestText = $latestText;
    }
    
    public function build()
    {
        $contents = DB::table('text_mail')->latest()->first();
    
        // Kiểm tra nếu tồn tại bản ghi
        if ($contents) {
            // Lấy nội dung của trường `text` của bản ghi đó
            $latestText = $contents->content;
        }
    
        return $this->view('backend.subcribe.sendMailSubcribe', ['latestText' => $latestText])->subject('Subcribe-ProductNews');
    }
}
