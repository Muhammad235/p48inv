<?php

namespace App\Services;
use App\Models\User;
use App\Mail\ReferralMail;
use App\Mail\UserRegistrationMail;
use Illuminate\Support\Facades\Mail;

class UserService {
    private $user;

    public function __construct($request)
    {
        $this->user = $request;
    }

    public function sendUserRegistrationEmail()
    {
        Mail::to($this->user->email)->send(new UserRegistrationMail($this->user));
    }

    public function sendReferralUserEmail()
    {
        $referralUser = User::where('username', $this->user->referral_id)->first(); 

        if ($referralUser) {
            $data = [
                'name' => $referralUser->name, 
            ];
            Mail::to($referralUser->email)->send(new ReferralMail($data));
        }
    }
}
