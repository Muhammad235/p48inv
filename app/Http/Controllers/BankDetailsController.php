<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\BankDetailsRequest;

class BankDetailsController extends Controller
{
    public function update(BankDetailsRequest $request, User $user) : RedirectResponse
    {

        $data = $request->validated();

        $user->bank()->updateOrCreate(['user_id' => $user->id], $data);

        return Redirect::back()->with('status', 'profile-updated');
    }
}
