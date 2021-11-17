<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;
use App\User;

class Emailvarification extends Notification
{
    use Queueable;

    private $token;
    private $expire;
    private $email;
    private $user_type;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $expiration, $email)
    {

        $this->token = $token;
        $this->expire = $expiration;
        $this->email = $email;
        $this->user_type = User::where('email', $email)->first();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting("")
            ->subject("Email Verification")
            ->view('mail.verifyemail', ['token' => $this->token, 'expiredate' => $this->expire, 'email' => $this->email, 'user' => $this->user_type]);
    }


    public function toDatabase($notifiable)
    {
        return [
            'greeting' => "",
            'body' => "",
            'thanks_text' => "",
            'actionLink' => ""
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
