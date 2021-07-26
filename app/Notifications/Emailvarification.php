<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;

class Emailvarification extends Notification
{
    use Queueable;

    private $token;
    private $expire;
    private $email;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token,$expiration,$email)
    {
        $this->token = $token;
        $this->expire=$expiration;
        $this->email=$email;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
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
            ->subject("Email Varification")
            ->view('mail.verifyemail',['token'=> $this->token,'expiredate'=>$this->expire,'email'=>$this->email]);
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
