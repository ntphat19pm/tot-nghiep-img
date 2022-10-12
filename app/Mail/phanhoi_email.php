<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class phanhoi_email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $phanhoi;
    public function __construct($phanhoi)
    {
        $this->phanhoi = $phanhoi;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.phanhoi')->subject('Phản hồi thông tin ứng tuyển ' . config('app.name', 'Viettel Solutions'));
    }
}
