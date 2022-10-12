<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\tuyendung;

class trungtuyen_mail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $trungtuyen;
    public function __construct($trungtuyen)
    {
        $this->trungtuyen = $trungtuyen;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.trungtuyen')->subject('Xác nhận trúng tuyển. Trở thành nhân viên ' . config('app.name', 'Viettel Solutions'));
    }
}
