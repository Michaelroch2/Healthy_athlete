<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Check if user is admin
        if (Auth::user()->cod_tipo_fk !== 'A') {
            return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta sección');
        }

        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:25',
            'apellido' => 'required|string|max:25',
            'cod_tipo_fk' => 'required|string|size:1',
            'tipo_documento' => 'required|string|max:5',
            'numero_documento' => 'required|string|max:12|unique:users',
            'edad' => 'required|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:10',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'cod_tipo_fk' => $request->cod_tipo_fk,
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'edad' => $request->edad,
            'email' => $request->email,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')
            ->with('success', 'Usuario registrado correctamente. Inicia sesión para continuar.');
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        // Check if current user is the owner of the profile or an admin
        if (Auth::id() != $id && Auth::user()->cod_tipo_fk !== 'A') {
            return redirect()->route('home')->with('error', 'No tienes permiso para editar este perfil');
        }
        
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // Check if current user is the owner of the profile or an admin
        if (Auth::id() != $id && Auth::user()->cod_tipo_fk !== 'A') {
            return redirect()->route('home')->with('error', 'No tienes permiso para actualizar este perfil');
        }
        
        $rules = [
            'nombre' => 'required|string|max:25',
            'apellido' => 'required|string|max:25',
            'tipo_documento' => 'required|string|max:5',
            'edad' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:10',
        ];
        
        // Only validate email and document number if they are changed
        if ($request->email != $user->email) {
            $rules['email'] = 'required|string|email|max:255|unique:users';
        }
        
        if ($request->numero_documento != $user->numero_documento) {
            $rules['numero_documento'] = 'required|string|max:12|unique:users';
        }
        
        // Only validate password if provided
        if ($request->filled('password')) {
            $rules['password'] = 'string|min:8|confirmed';
        }
        
        $validator = Validator::make($request->all(), $rules);
        
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->tipo_documento = $request->tipo_documento;
        $user->numero_documento = $request->numero_documento;
        $user->edad = $request->edad;
        $user->email = $request->email;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->genero = $request->genero;
        
        // Only update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();
        
        return redirect()->route('users.show', $user->id)
            ->with('success', 'Perfil actualizado correctamente');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Only admins can delete users
        if (Auth::user()->cod_tipo_fk !== 'A') {
            return redirect()->route('home')->with('error', 'No tienes permiso para eliminar usuarios');
        }
        
        $user = User::findOrFail($id);
        $user->delete();
        
        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado correctamente');
    }

    /**
     * Show user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    /**
     * Show the form for editing user's own profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        $user = Auth::user();
        return view('users.edit-profile', compact('user'));
    }

    /**
     * Update user's own profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        return $this->update($request, Auth::id());
    }
}