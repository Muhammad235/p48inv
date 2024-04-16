<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Referral;
use App\Services\UserService;
use Illuminate\View\View;
use App\Mail\ReferralMail;
use Illuminate\Http\Request;
use App\Mail\UserRegistrationMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\RegisterUserRequest;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {

        $referral_id = $request->query('ref');

        return view('auth.register', compact('referral_id'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterUserRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());

        $referral_id = $request->referral_id;

        if(!empty(trim($referral_id))){

            $userData = User::where('username', $referral_id)->get();

            if(count($userData) > 0){

                Referral::insert([
                    'user_id' => $user->id, //the user been referred id
                    'referred_by' => $referral_id,   
                    'referring_user_id' => $userData[0]['id']  //the user referrering id
                ]);
            }
        }

        event(new Registered($user));

        // $userService = new UserService($request);
        // $userService->sendUserRegistrationEmail();
        // $userService->sendReferralUserEmail();


        Auth::login($user);
        
        return redirect(RouteServiceProvider::HOME);
    }
}
