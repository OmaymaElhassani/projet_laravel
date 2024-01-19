<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use Illuminate\Http\Request;

class FilieresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $filieres = Filiere::all();
        return view('filieres.index')->with([
            'filieres'=>$filieres
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('filieres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'nom' => 'required',

        ]);
        Filiere::create($request->except('_token'));
        return redirect()->route('filieres.index')->with([
           'success' => 'Filiere added successfuly'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $filiere =Filiere::where('id',$id)->first();
        return view('filieres.show')->with([
            'filiere' => $filiere
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $filiere =Filiere::where('id',$id)->first();
        return view('filieres.edit')->with([
            'filiere' => $filiere
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $filiere =Filiere::where('id',$id)->first();
        $this->validate($request,[
            'nom' => 'required',
        ]);
        $filiere->update($request->except('_token','_method'));
        return redirect()->route('filieres.index')->with([
           'success' => 'Filiere updated successfuly'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $filiere =Filiere::where('id',$id)->first();
        $filiere->delete();
        return redirect()->route('filieres.index')->with([
            'success' => 'Filiere deleted successfuly'
         ]);
    }
}
