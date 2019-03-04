<?php

namespace App\Mail;

use App\Product;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendProductUpdate extends Mailable
{
    use Queueable, SerializesModels;
    public $product;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product,User $user)
    {
        $this->product = $product;
        $this->user    = $user;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.products.updated');
    }
}
