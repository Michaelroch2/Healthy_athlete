<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Mostrar el perfil del usuario
     */
    public function show()
    {
        $user = Auth::user();
        $userSports = $user->sports ?? [];
        
        return view('profile.show', compact('userSports'));
    }

    /**
     * Actualizar la foto de perfil
     */
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Eliminar foto anterior si existe
        if ($user->profile_photo) {
            Storage::disk('public')->delete($user->profile_photo);
        }

        // Guardar nueva foto
        $path = $request->file('profile_photo')->store('profile-photos', 'public');
        
        // Actualizar en la base de datos
        $user->profile_photo = $path;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Foto de perfil actualizada correctamente');
    }

    /**
     * Actualizar deportes seleccionados
     */
    public function updateSports(Request $request)
    {
        $request->validate([
            'deportes' => 'required|array|max:3',
        ]);

        $user = Auth::user();
        $user->sports = $request->deportes;
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Deportes actualizados correctamente');
    }
}