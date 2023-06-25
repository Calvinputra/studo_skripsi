<?php

namespace App\Mail;

use App\Models\Goal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderEmail extends Mailable
{

    use Queueable, SerializesModels;

    public $goals;

    /**
     * Create a new message instance.
     *
     * @param  Goal  $goals
     * @return void
     */
    public function __construct(Goal $goals)
    {
        $this->goals = $goals;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Studosite@gmail.com')
            ->view('emails.goals', ['goals' => $this->goals]);
    }
}
