<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone_no' => ['required', 'max:15', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'username' => ['required', 'string', 'min:8', 'unique:'.User::class],
            'referral_id' => ['nullable', 'string', 'min:8', 'exists:users,username']
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        if(!empty(trim($request->referring_code))){

            $userData = User::where('username', $request->referring_code)->get();

            if(count($userData) > 0){

                Referral::insert([
                    'user_id' => $user->id, //the user been referred id
                    'referred_by' => $request->referral_id,   
                    'referring_user_id' => $userData[0]['id']  //the user referrering id
                ]);

            }else{
                dd('Invalid referrer code');
            }

        }


        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
