<?php

namespace App\Http\Controllers;


use App\Models\Repartidor;
use Illuminate\Http\Request;

class RepartidorController extends Controller
{
    public function index()
    {
        $repartidores = Repartidor::all();
        return view('repartidor.index', compact('repartidores'));
    }

    public function create()
    {
        return view('repartidor.crear');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'paterno' => 'required|string|max:255',
            'materno' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255|unique:repartidors,correo',
            'numero_licencia' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('repartidores', 'public');
            $validated['imagen'] = $path;
        }

        $repartidor = Repartidor::create($validated);
        return redirect()->route('repartidor.index')->with('success', 'Repartidor creado correctamente.');
    }

    public function show($id)
    {
        $repartidor = Repartidor::findOrFail($id);
        return view('repartidor.mostrar', compact('repartidor'));
    }

    public function edit($id)
    {
        $repartidor = Repartidor::findOrFail($id);
        return view('repartidor.editar', compact('repartidor'));
    }

    public function update(Request $request, $id)
    {
        $repartidor = Repartidor::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'paterno' => 'required|string|max:255',
            'materno' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255|unique:repartidors,correo,' . $repartidor->id,
            'numero_licencia' => 'required|string|max:255',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('repartidores', 'public');
            $validated['imagen'] = $path;
        }

        $repartidor->update($validated);
        return redirect()->route('repartidor.index')->with('success', 'Repartidor actualizado correctamente.');
    }

    public function destroy($id)
    {
        $repartidor = Repartidor::findOrFail($id);
        $repartidor->delete();
        return redirect()->route('repartidor.index')->with('success', 'Repartidor eliminado correctamente.');
    }
}
