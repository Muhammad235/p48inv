<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Referral;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.auth.login');
    }

    public function dashboard(UsersDataTable $dataTable)
    {   
        return $dataTable->render('admin.dashboard.index');
    }

    public function edit()
    {
        return view('admin.dashboard.profile');
    }

    public function update(UpdatePasswordRequest $request)
    {
        // dd($request);
        
        $validated = $request->validated();

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/adm');
    }


    public function ReferralDetails(Request $request)
    {

        $userReferrals = Referral::with('user')->where('referred_by',  $request->referred_by)->get();

        return view('render.referral-modal', compact('userReferrals'))->render();        
    }
}