<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Filiere;
use Illuminate\Http\Request;

class EtudiantsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
        $etudiants = Etudiant::all();
        return view('etudiants.index')->with([
            'etudiants'=>$etudiants
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $filieres = Filiere::all();
        return view('etudiants.create', compact('filieres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'filiere_id' => 'required'
        ]);

        // Convertir le tableau sexe en une chaîne séparée par des virgules
        $sexe = implode(',', $request->input('sexe'));

        Etudiant::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'sexe' => $sexe,
            'filiere_id' => $request->input('filiere_id')
        ]);

        return redirect()->route('etudiants.index')->with([
            'success' => 'Etudiant added successfuly'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $etudiant =Etudiant::where('id',$id)->first();
        return view('etudiants.show')->with([
            'etudiant' => $etudiant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $etudiant = Etudiant::find($id);
        $filieres = Filiere::all();

        return view('etudiants.edit', compact('etudiant', 'filieres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'sexe' => 'required',
            'filiere_id' => 'required'
        ]);

        // Convertir le tableau sexe en une chaîne séparée par des virgules
        $sexe = $request->input('sexe');
         // Vérifier si $sexe est un tableau
          if (is_array($sexe)) {
    // Convertir le tableau sexe en une chaîne séparée par des virgules
                 $sexe = implode(',', $sexe);
          }
        // Récupérer l'étudiant à mettre à jour
        // Récupérer l'ID de la filière à partir du nom
$filiereName = $request->input('filiere_id');
$filiere = Filiere::where('nom', $filiereName)->first();

// Vérifier si la filière existe
if ($filiere) {
    // Récupérer l'étudiant à mettre à jour
    $etudiant = Etudiant::find($id);

    // Mettre à jour les champs
    $etudiant->update([
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'sexe' => $sexe,
        'filiere_id' => $filiere->id, // Utiliser l'ID de la filière
    ]);

    return redirect()->route('etudiants.index')->with([
        'success' => 'Etudiant updated successfully'
    ]);
} else {
    return redirect()->back()->withInput()->withErrors(['filiere_id' => 'Filière invalide']);
}

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $etudiant =Etudiant::where('id',$id)->first();
        $etudiant->delete();
        return redirect()->route('etudiants.index')->with([
            'success' => 'Etudiant deleted successfuly'
         ]);
    }
}
