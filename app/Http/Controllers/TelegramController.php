<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\User;
use Auth;
use Illuminate\Http\Request;
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

            if($ownerTelegram != null){
                Telegram::sendMessage([
                    'chat_id' => $ownerTelegram,
                    'text' => __('apartments.your') . $apartment->name . __('apartments.rented') . $dates->entry . __('apartments.to') . $dates->pivot->exit
                ]);
            }

            if($user->telegram != null)
            {
                Telegram::sendMessage([
                    'chat_id' => $user->telegram,
                    'text' => __('apartments.useryour') . $apartment->name . __('apartments.userrented') . $dates->entry . __('apartments.userto') . $dates->pivot->exit
                ]);
            }

        } catch (\Exception $exception){

        }

        return;
    }


}
