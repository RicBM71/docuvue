<?php

namespace App\Listeners;

use App\Events\UsuarioFueCreado;
use App\Mail\CredencialesLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class EnviarCredencialesLogin
{
    

    /**
     * Handle the event.
     *
     * @param  UsuarioFueCreado  $event
     * @return void
     */
    public function handle(UsuarioFueCreado $event)
    {
        //dd($event->user->toArray(), $event->password);
        // TODO: usar ->queue();, hay que configurar redis o beanstalk QUEUE_DRIVER=sync, en este caso
        // daría igual 
        Mail::to($event->user)->send(new CredencialesLogin($event->user, $event->password));
    }
}
