<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function index()
    {
        $ubicaciones = Ubicacion::all();
        return view('ubicaciones.index', compact('ubicaciones'));
    }

    public function create()
    {
        return view('ubicaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'direccion' => 'required|max:255',
            'referencia' => 'nullable|max:255',
        ]);

        Ubicacion::create($request->all());

        return redirect()->route('ubicaciones.index')->with('success', 'Ubicación creada correctamente.');
    }

    public function show(Ubicacion $ubicacione) // Nota: Laravel usa el singular para route model binding
    {
        return view('ubicaciones.show', compact('ubicacione'));
    }

    public function edit(Ubicacion $ubicacione)
    {
        return view('ubicaciones.edit', compact('ubicacione'));
    }

    public function update(Request $request, Ubicacion $ubicacione)
    {
        $request->validate([
            'direccion' => 'required|max:255',
            'referencia' => 'nullable|max:255',
        ]);

        $ubicacione->update($request->all());

        return redirect()->route('ubicaciones.index')->with('success', 'Ubicación actualizada correctamente.');
    }

    public function destroy(Ubicacion $ubicacione)
    {
        $ubicacione->delete();

        return redirect()->route('ubicaciones.index')->with('success', 'Ubicación eliminada correctamente.');
    }
}