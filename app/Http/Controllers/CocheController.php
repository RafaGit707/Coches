<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coche;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $coches = Coche::all();
        $coches = Coche::precioMenorQue(12000)->anoMayorQue(2013)->get();
        return view('index', compact('coches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'ano' => 'required|numeric',
        ]);
    
        Coche::create($validated);
    
        return redirect()->route('coches.index')->with('success', 'Coche creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coche = Coche::findOrFail($id);
        return view('show', compact('coche'));//
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coche = Coche::findOrFail($id);
        return view('edit', compact('coche'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'ano' => 'required|numeric',
        ]);
    
        $coche = Coche::findOrFail($id);
        $coche->update($validated);
    
        return redirect()->route('coches.index')->with('success', 'Coche actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coche = Coche::findOrFail($id);
        $coche->delete();
    
        return redirect()->route('coches.index')->with('success', 'Coche eliminado exitosamente');
    }

}
