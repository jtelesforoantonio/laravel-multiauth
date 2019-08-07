<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    /**
     * The user name.
     *
     * @var string
     */
    public $name;

    /**
     * The url for the action button.
     *
     * @var string
     */
    public $action;

    /**
     * Create a notification instance.
     *
     * @param  string  $name
     * @param string $action
     * @return void
     */
    public function __construct($name, $action)
    {
        $this->name = $name;
        $this->action = $action;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting("Hello {$this->name}")
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', $this->action)
            ->line('If you did not request a password reset, no further action is required.');
    }
}
