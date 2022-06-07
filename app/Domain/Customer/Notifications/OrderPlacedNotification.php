<?php

namespace App\Domain\Customer\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;

class OrderPlacedNotification extends Notification
{
    use Queueable;

    protected $customer;
    protected $products_no;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($customer, $products_no)
    {
        $this->customer    = $customer;
        $this->products_no = $products_no;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // logger("There's a new Pruchase from your store by ". $this->customer->name);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        logger("There's a new Pruchase from your store by ". $this->customer->name);
    }
}
