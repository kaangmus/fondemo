<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\MMFileUploaded;
use Illuminate\Support\Facades\Log;

class MMFileUploadedListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(MMFileUploaded $event)
    {
        Log::info('This is some useful information.',$event);
    }
}
