<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Methods\Chat;

class TelegramController extends Controller
{
    public function updatedActivity()
    {
        /*$activity = Telegram::getUpdates();
        dd($activity);

        Telegram::sendMessage([
            'chat_id' => Auth::user()->telegram,
            'text' => 'Hello world, hay que hablar primero al bot y en la DB tener el ID del usuario al que se espera enviar el mensaje por telegram!'
        ]);
        return;*/
    }

    public static function sendTelegrams($user,$ownerTelegram,Apartment $apartment)
    {
        try {

            $dates = $apartment->getDatesRented($user->id);
            $entrada = Config::get('app.locale') == 'es' ? date("d/m/Y", strtotime($dates->pivot->entry)) : $dates->pivot->entry;
            $salida = Config::get('app.locale') == 'es' ? date("d/m/Y", strtotime($dates->pivot->exit)) : $dates->pivot->exit;

            if($ownerTelegram != null){
                Telegram::sendMessage([
                    'chat_id' => $ownerTelegram,
                    'text' => __('apartments.your') . $apartment->name . __('apartments.rented') . $entrada . __('apartments.to') . $salida
                ]);
            }

            if($user->telegram != null)
            {
                Telegram::sendMessage([
                    'chat_id' => $user->telegram,
                    'text' => __('apartments.useryour') . $apartment->name . __('apartments.userrented') . $entrada . __('apartments.userto') . $salida
                ]);
            }

        } catch (\Exception $exception){

        }

        return;
    }


}
