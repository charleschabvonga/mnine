<?php

namespace App\Listeners;

use App\Events\PersonCreated;
use App\Jobs\SendPersonCapturedInformationEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class TriggerPersonCapturedInformationJob
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PersonCreated $event): void
    {
        $person = $event->person;
        dispatch(new SendPersonCapturedInformationEmailJob($person));
    }
}
