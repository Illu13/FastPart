<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if ($request->has('photo')) {
            $imagen = $request->file('photo');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
            $ruta = $imagen->store('public/img/userPhotos');
            $rutaPublica = str_replace('public', 'storage', $ruta);

        }
        if (Auth::user()->photo != "storage/img/userPhotos/defaultUserImage.png") {
            File::delete(Auth::user()->photo);
            setcookie("prueba7", Auth::user()->photo, time() + (86400));

        }
        $request->user()->fill($request->validated());
        if (isset($rutaPublica)) {
            $request->user()->photo = $rutaPublica;
        }


        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }


        $request->user()->save();
        if (isset($validator)) {
            return Redirect::route('profile.edit')->with('status', 'profile-updated')->withErrors($validator);
        } else {
            return Redirect::route('profile.edit')->with('status', 'profile-updated');
        }
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
    public function index(): View
    {
        return view('users.users');
    }
}
