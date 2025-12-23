<?php

namespace App\Jobs;
use Illuminate\Support\Facades\Mail; // Import the Mail facade
use App\Mail\UserRegistered; // Ensure you import the Mailable
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable; // Add this for dispatching jobs
use Illuminate\Foundation\Queue\Queueable;


class SendUserRegisteredEmail implements ShouldQueue
{
    use Dispatchable, Queueable;

    protected $user;

    /**
     * Create a new job instance.
     */
    public function __construct($user)
    {
        $this->user = $user; // Ensure the user is assigned correctly
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Log to verify the user is set correctly
        //\Log::info('Sending registration email to: ' . $this->user->email);

        // Send the email
        Mail::to($this->user->email)->send(new UserRegistered($this->user));
    }
}
