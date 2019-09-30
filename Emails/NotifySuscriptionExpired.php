<?php

namespace Modules\Suscriptions\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class NotifySuscriptionExpired extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subscription;
    public $subject;
    public $view;

    public function __construct($subscription,$subject,$view)
    {
        $this->subscription = $subscription;
        $this->subject = $subject;
        $this->view = $view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view($this->view)
            ->subject($this->subject);
    }
}
