<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EntrenadorController extends Controller
{
    public function createClub()
{
    return view('entrenadores.createclub');
}

public function storeClub(Request $request)
{
    // Validar datos
    $validated = $request->validate([
        'nombreClub' => 'required|string|max:25',
        'descripcionClub' => 'nullable|string|max:100',
        'mensualidadClub' => 'required|integer|min:0',
    ]);
    
    // Crear el club
    $club = Club::create($validated);

    // Regresar a la misma página con mensaje de éxito
    return back()->with('success', 'Club creado exitosamente.');
}
    public function perfil()
    {
        return view('entrenadores.perfil');
    }
    public function clubes()
    {
        return view('entrenadores.clubes');
    }
    
    /**
     * Display a listing of athletes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('cod_tipo_fk', 'E')->get();

        return view('entrenadores.index', compact('users'));
    }

    /**
     * Show the form for creating a new athlete.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('entrenadores.create');
    }

    /**
     * Store a newly created athlete in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if user is admin
        if (Auth::user()->cod_tipo_fk !== 'A') {
            return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta sección');
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:25',
            'apellido' => 'required|string|max:25',
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
            'cod_tipo_fk' => 'D', // Fixed value for athlete
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => $request->numero_documento,
            'edad' => $request->edad,
            'email' => $request->email,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('entrenadores.index')
            ->with('success', 'Entrenador registrado correctamente.');
    }

    /**
     * Display the specified athlete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrenador = User::where('id', $id)->where('cod_tipo_fk', 'E')->firstOrFail();
        return view('entrenadores.show', compact('entrenador'));
    }

    /**
     * Show the form for editing the specified athlete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Check if user is admin
        $users = User::findOrFail($id);
    return view('entrenadores.edit', compact('users'));
        // Check if user is admin
        if (Auth::user()->cod_tipo_fk !== 'A') {
            return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta sección');
        }

        $entrenador = User::where('id', $id)->where('cod_tipo_fk', 'E')->firstOrFail();
        return view('entrenadores.edit', compact('entrenador'));
    }

    /**
     * Update the specified athlete in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'tipo_documento' => 'required|string',
            'numero_documento' => 'required|string',
            'edad' => 'required|integer|min:0',
            'email' => 'required|email',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string',
            'password' => 'nullable|string|min:6',
            
        ]);
        // Check if user is admin
        if (Auth::user()->cod_tipo_fk !== 'A') {
            return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta sección');
        }

        $entrenador = User::where('id', $id)->where('cod_tipo_fk', 'E')->firstOrFail();
        
        $rules = [
            'nombre' => 'required|string|max:25',
            'apellido' => 'required|string|max:25',
            'tipo_documento' => 'required|string|max:5',
            'edad' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:10',
        ];
        
        // Only validate email and document number if they are changed
        if ($request->email != $entrenador->email) {
            $rules['email'] = 'required|string|email|max:255|unique:users';
        }
        
        if ($request->numero_documento != $entrenador->numero_documento) {
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
        
        $entrenador->nombre = $request->nombre;
        $entrenador->apellido = $request->apellido;
        $entrenador->tipo_documento = $request->tipo_documento;
        $entrenador->numero_documento = $request->numero_documento;
        $entrenador->edad = $request->edad;
        $entrenador->email = $request->email;
        $entrenador->fecha_nacimiento = $request->fecha_nacimiento;
        $entrenador->genero = $request->genero;
        
        // Only update password if provided
        if ($request->filled('password')) {
            $entrenador->password = Hash::make($request->password);
        }
        
        $entrenador->save();
        
        return redirect()->route('entrenadores.index')
            ->with('success', 'Entrenador actualizado correctamente');
    }

    /**
     * Remove the specified athlete from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Check if user is admin
        
        $entrenador = User::where('id', $id)->where('cod_tipo_fk', 'E')->firstOrFail();
        $entrenador->delete();
        
        return redirect()->route('entrenadores.index')
            ->with('success', 'Entrenador eliminado correctamente');
    }
}