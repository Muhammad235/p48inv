<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.auth.login');
    }


    public function dashboard()
    {

        return view('admin.dashboard.index');
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