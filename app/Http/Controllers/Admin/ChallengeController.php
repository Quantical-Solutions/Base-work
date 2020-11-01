<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use App\Mails\VerifyCode;
use Illuminate\Support\Facades\Mail;

class ChallengeController extends Controller
{
    public function index()
    {
        $this->create2FC();
        $id = Auth::id();
        $user = User::select('name', 'email', 'email_code')->where('id', $id)->first();
        $email = $user->email;
        $this->send2FCEmail($email, $user);
        return view('auth/challenge');
    }

    public function verified(Request $request)
    {
        $timer = $this->getTimer();
        $id = Auth::id();
        $codes = User::where('id', $id)->select('phone_code', 'email_code')->first();

        if ($timer !== false && !$request->session()->has('2FC')) {

            if ($request->input('code') == $codes->phone_code || $request->input('code') == $codes->email_code) {

                $this->deleteTimer();
                $id = Auth::id();
                User::where('id', $id)->update(['phone_code' => null, 'email_code' => null]);
                session(['2FC' => 'ok']);
                return redirect()->route('Accueil');

            } else {

                $this->index();
            }
        } else {

            return redirect()->route('login');
        }
    }

    private function create2FC()
    {
        if ($this->getTimer('HeRttYu76') === false) {

            $phone_bytes = random_bytes(3);
            $phone_code = strtoupper(bin2hex($phone_bytes));
            $email_bytes = random_bytes(3);
            $email_code = strtoupper(bin2hex($email_bytes));
            $id = Auth::id();
            User::where('id', $id)->update(['phone_code' => $phone_code, 'email_code' => $email_code]);
            $this->setTimer('HeRttYu76', 'kfkTgRghkuKjg6Yt554gbnkOK', 5);
        }
    }

    private function setTimer($name, $value, $minutes)
    {
        setcookie($name, $value, time() + (60 * $minutes));
    }

    private function getTimer()
    {
        $value = (isset($_COOKIE['HeRttYu76'])) ? $_COOKIE['HeRttYu76'] : false;
        return $value;
    }

    private function deleteTimer()
    {
        setcookie('HeRttYu76', '', time() - 3600);
    }

    private function send2FCEmail($email, $user)
    {
        Mail::to($email)->send(new VerifyCode($user));
    }
}
