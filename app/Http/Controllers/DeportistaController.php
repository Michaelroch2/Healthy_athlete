<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DeportistaController extends Controller
{
    public function perfil()
    {
        return view('deportistas.perfil');
    }

    public function rutinas()
    {
        return view('deportistas.rutinas');
    }
    public function clubes()
    {
        return view('deportistas.clubes');
    }
    /**
     * Display a listing of athletes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('cod_tipo_fk', 'D')->get();

        return view('deportistas.index', compact('users'));
    }

    /**
     * Show the form for creating a new athlete.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('deportistas.create');
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

        return redirect()->route('deportistas.index')
            ->with('success', 'Deportista registrado correctamente.');
    }

    /**
     * Display the specified athlete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deportista = User::where('id', $id)->where('cod_tipo_fk', 'D')->firstOrFail();
        return view('deportistas.show', compact('deportista'));
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
    return view('deportistas.edit', compact('users'));
        // Check if user is admin
        if (Auth::user()->cod_tipo_fk !== 'A') {
            return redirect()->route('home')->with('error', 'No tienes permiso para acceder a esta sección');
        }

        $deportista = User::where('id', $id)->where('cod_tipo_fk', 'D')->firstOrFail();
        return view('deportistas.edit', compact('deportista'));
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

        $deportista = User::where('id', $id)->where('cod_tipo_fk', 'D')->firstOrFail();
        
        $rules = [
            'nombre' => 'required|string|max:25',
            'apellido' => 'required|string|max:25',
            'tipo_documento' => 'required|string|max:5',
            'edad' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:10',
        ];
        
        // Only validate email and document number if they are changed
        if ($request->email != $deportista->email) {
            $rules['email'] = 'required|string|email|max:255|unique:users';
        }
        
        if ($request->numero_documento != $deportista->numero_documento) {
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
        
        $deportista->nombre = $request->nombre;
        $deportista->apellido = $request->apellido;
        $deportista->tipo_documento = $request->tipo_documento;
        $deportista->numero_documento = $request->numero_documento;
        $deportista->edad = $request->edad;
        $deportista->email = $request->email;
        $deportista->fecha_nacimiento = $request->fecha_nacimiento;
        $deportista->genero = $request->genero;
        
        // Only update password if provided
        if ($request->filled('password')) {
            $deportista->password = Hash::make($request->password);
        }
        
        $deportista->save();
        
        return redirect()->route('deportistas.index')
            ->with('success', 'Deportista actualizado correctamente');
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
        
        $deportista = User::where('id', $id)->where('cod_tipo_fk', 'D')->firstOrFail();
        $deportista->delete();
        
        return redirect()->route('deportistas.index')
            ->with('success', 'Deportista eliminado correctamente');
    }
}