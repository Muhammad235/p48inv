<?php

namespace App\Http\Controllers\Admin;

use App\Models\Referral;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.auth.login');
    }


    public function dashboard(): View
    {
        $usersCount = User::where('role', '!=', 'admin')->count();
        $referredUsersCount = Referral::all()->count();

        $nonReferredUsersCount = $usersCount - $referredUsersCount;

        return view('admin.dashboard.index', compact('usersCount', 'referredUsersCount', 'nonReferredUsersCount'));
    }

    public function edit()
    {
        return view('admin.dashboard.profile');

    }

    public function update(Request $request)
    {
        // return view('admin.dashboard.profile');

    }
}