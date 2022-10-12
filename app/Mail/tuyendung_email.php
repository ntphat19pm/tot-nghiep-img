<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\tuyendung;
use Carbon\Carbon;

class tuyendung_email extends Mailable
{
    use Queueable, SerializesModels;

    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $tuyendung;
    public function __construct($tuyendung)
    {
        $this->tuyendung = $tuyendung;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $now=Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        return $this->view('emails.tuyendung')->subject('Thông tin ứng tuyển thành công tại' . config('app.name', 'Viettel Solutions').' - '.$now);
    }
}
