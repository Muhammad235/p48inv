<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{

    use FileUploadTrait;
    /**
     * Display the user's profile form.
     */
    // public function edit(Request $request): View
    // {
    //     return view('profile.edit', [
    //         'user' => $request->user()->load('bank'),
    //     ]);
    // }

    public function edit(User $user): View
    {
        return view('admin.user-profile.profile', [
            'user' => $user,
        ]);

    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        $userData = $request->validated();

        // Retrieve user
        $user = $request->user();

        $path = 'avatar_img/' . $user->image;

        // Upload image
        $imagePath = $this->uploadImage($request, 'image', '/avatar_img');

        if ($user->image) {
            $this->removeImage($path);
        }

        $userData['image'] = $imagePath; // Set image path, or keep the existing one
        $user->fill($userData);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        if ($request->user()->role === 'admin') {
            return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
       }

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
