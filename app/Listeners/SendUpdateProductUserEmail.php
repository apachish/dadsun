<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use App\Mail\SendProductUpdate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendUpdateProductUserEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductUpdated  $event
     * @return void
     */
    public function handle(ProductUpdated $event)
    {
        Mail::to($event->user)->send(new SendProductUpdate($event->product,$event->user));

    }
}
