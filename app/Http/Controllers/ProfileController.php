<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


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
       
        $request->user()->fill($request->validated());

        // Verificar si se ha enviado un nuevo archivo de avatar
    if ($request->hasFile('avatar')) {
        $newAvatar = $request->file('avatar');
        
        // Obtener el nombre del archivo actual del usuario
        $currentAvatar = $request->user()->avatar;

        // Si el nombre del archivo actual no es 'UserProfile.png', eliminarlo
        if ($currentAvatar != 'UserProfile.png') {
            Storage::delete('public/user_avatar/' . $currentAvatar);
        }

        // Generar un nuevo nombre único para el archivo
        $newAvatarName = time() . "-" . $newAvatar->getClientOriginalName();

        // Almacenar el nuevo avatar en el almacenamiento
        $newAvatar->storeAs('public/user_avatar', $newAvatarName);

        // Asignar el nuevo nombre de avatar al usuario
        $request->user()->avatar = $newAvatarName;
    }

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
