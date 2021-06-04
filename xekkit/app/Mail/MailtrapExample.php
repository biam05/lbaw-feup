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

    private $name = "";
    private $link = "";

    public function __construct($n, $l)
    {
        $this->name = $n;
        $this->link = $l;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
  
        return $this->from('lbaw2114@gmail.com', 'Xekkit')
            ->subject('Mailtrap Confirmation')
            ->markdown('mails.exmpl')
            ->with([
                'name' => $this->name,
                'link' => $this->link
            ]);
    }
}
