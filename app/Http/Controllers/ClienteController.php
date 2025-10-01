<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.crear');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ci' => 'required|string|max:50|unique:clientes,ci',
            'nombre' => 'required|string|max:255',
            'paterno' => 'required|string|max:255',
            'materno' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255|unique:clientes,correo',
        ]);
        $cliente = Cliente::create($validated);
        return redirect()->route('cliente.index')->with('success', 'Cliente creado correctamente.');
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.mostrar', compact('cliente'));
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.editar', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $validated = $request->validate([
            'ci' => 'required|string|max:50|unique:clientes,ci,' . $cliente->id,
            'nombre' => 'required|string|max:255',
            'paterno' => 'required|string|max:255',
            'materno' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'correo' => 'required|email|max:255|unique:clientes,correo,' . $cliente->id,
        ]);
        $cliente->update($validated);
        return redirect()->route('cliente.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('success', 'Cliente eliminado correctamente.');
    }
}