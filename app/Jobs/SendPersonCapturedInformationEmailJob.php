<?php

namespace App\Jobs;

use App\Mail\SendPersonCapturedInformationEmail;
use App\Models\Person;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPersonCapturedInformationEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Person $person)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = new SendPersonCapturedInformationEmail($this->person);
        Mail::to($this->person->email)->send($email);
    }
}
