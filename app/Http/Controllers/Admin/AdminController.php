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

    public function update(Request $request)
    {
        // return view('admin.dashboard.profile');

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
        // return ($request->all());

        $request->username = 'adeleke01';

        try {
            $user = Referral::with('user')->where('referred_by',  $request->username)->get();
            return $user;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'User not found'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        
        
        
    }
}