<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\User;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Methods\Chat;

class TelegramController extends Controller
{
    public function updatedActivity()
    {
        /*$activity = Telegram::getUpdates();
        dd($activity);*/

        Telegram::sendMessage([
            'chat_id' => '444388371',
            'text' => 'Hello world, hay que hablar primero al bot y en la DB tener el ID del usuario al que se espera enviar el mensaje por telegram!'
        ]);
        return;
    }

    public static function sendTelegrams($userTelegram,$ownerTelegram,Apartment $apartment)
    {
        /*$activity = Telegram::getUpdates();
        dd($activity);*/

        try {
            /*Telegram::sendMessage([
           'chat_id' => $ownerTelegram,
           'text' => 'Hello world, hay que hablar primero al bot y en la DB tener el ID del usuario al que se espera enviar el mensaje por telegram!'
            ]);*/

            Telegram::sendMessage([
                'chat_id' => $userTelegram,
                'text' => 'Hello world, hay que hablar primero al bot y en la DB tener el ID del usuario al que se espera enviar el mensaje por telegram!'
            ]);

        } catch (\Exception $exception){

        }

        return;
    }
}
