<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\BankDetailsRequest;

class BankDetailsController extends Controller
{
    public function store(BankDetailsRequest $request) : RedirectResponse
    {

        $data = $request->validated();

        $user = auth()->user();

        $user->bank()->updateOrCreate(['user_id' => $user->id], $data);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
}
