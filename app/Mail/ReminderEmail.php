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
        $goals_data = Goal::join('subscription', 'subscription.id', '=', 'goals.subscription_id')
        ->join('classes', 'classes.id', '=', 'subscription.class_id')
        ->join('users', 'users.id', '=', 'subscription.user_id')
        ->select([
            'goals.*',
            'users.id as user_id',
            'users.name as user_name',
            'users.email as user_email',
            'classes.id as class_id',
            'classes.name as class_name',
            'classes.slug as class_slug',
        ])
        ->where('subscription_id', $goals->subscription_id)->first();

        $this->goals = $goals_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Reminder for ' . $this->goals->user_email)
            ->view('emails.goals')
            ->with([
                'goals' => $this->goals,
            ]);
    }
}
