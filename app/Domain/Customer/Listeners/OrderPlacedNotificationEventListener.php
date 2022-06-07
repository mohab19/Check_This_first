<?php

namespace App\Domain\Customer\Listeners;

use App\Domain\Customer\Notifications\OrderPlacedNotification;
use App\Domain\Customer\Events\OrderPlacedNotificationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OrderPlacedNotificationEventListener
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
    public function handle(OrderPlacedNotificationEvent $event)
    {
        $merchants = [];
        foreach ($event->cart->Products as $product)
        {
            if(isset($merchants[$product->Product->Store->Merchant->id]))
                $merchants[$product->Product->Store->Merchant->id] += 1;
            else
                $merchants[$product->Product->Store->Merchant->id]  = 0;
        }

        foreach ($event->cart->Products as $product) {
            // here we supposed to notify the merchant
            // $product->Product->Store->Merchant->notify(new OrderPlacedNotification($event->cart->Customer, $merchants[$product->Product->Store->Merchant->id]));
        }

    }
}
