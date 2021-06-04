<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailtrapExample extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $password = "";
    private $name = "";

    public function __construct($p, $n)
    {
        $this->password = $p;
        $this->name = $n;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
  
        return $this->from('no-reply@xekkit.com', 'Xekkit')
            ->subject('Mailtrap Confirmation')
            ->markdown('mails.exmpl')
            ->with([
                'name' => $this->name,
                'password' => $this->password,
                'link' => 'http://lbaw2114.lbaw-prod.fe.up.pt/login'
            ]);
    }
}
