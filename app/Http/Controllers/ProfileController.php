<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Traits\FileUploadTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\BankDetailsRequest;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{

    use FileUploadTrait;

    public function edit(User $user): View
    {
        return view('admin.user-profile.profile', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, User $user): RedirectResponse
    {
        $userData = $request->validated();

        $path = 'avatar_img/' . $user->image;

        // Upload image
        $imagePath = $this->uploadImage($request, 'image', '/avatar_img');

        if ($user->image) {
            $this->removeImage($path);
        }

        $userData['image'] = $imagePath; 
        $user->fill($userData);

        $user->save();

        if ($request->user()->role === 'admin') {
            return Redirect::back()->with('status', 'saved successfully');
       }

        return Redirect::route('profile.edit')->with('status', 'saved successfully');
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
