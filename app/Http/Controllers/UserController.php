<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Referral;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userReferrals = Referral::with('user')->where('referring_user_id', $user->id)->paginate(10);

        return view('dashboard', compact('userReferrals'));
    }
}
