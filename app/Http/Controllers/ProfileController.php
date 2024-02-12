<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $imagen = $request->file('photo');
            $nombreImagen = time() . '_' . $imagen->getClientOriginalName();

            // Guardar la imagen en la carpeta storage/public/img/userPhotos
            $ruta = $imagen->storeAs('public/storage/img/userPhotos', $nombreImagen);

            // Obtener la ruta relativa para guardarla en la base de datos
            $rutaRelativa = 'storage/img/userPhotos/' . $nombreImagen;
            $request->photo = $rutaRelativa;

        }
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }


        $request->user()->save();

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
