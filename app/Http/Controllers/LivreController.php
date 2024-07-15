<?php

namespace App\Http\Controllers;

use App\Rules\IsValidISBN;
use App\Models\livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $livres = livre::all();
        return view('livres.index', ['livres' => $livres]);
    }

    public function create()
    {
        return view('livres.create');
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|max:255',
                'author' => 'required|max:255',
                'isbn' => ['required'],
                'published_date' => 'required|date'
            ]);

            $livre = new livre($data);


            $livre->save();
            return redirect('/livres')->with('success', 'Livre enregistré avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erreur lors de la sauvegarde du livre.');
        }
    }

    public function edit($id)
    {
        $livre = livre::findOrFail($id);
        return view('livres.edit', ['livre' => $livre]);
    }

    public function update(Request $request, $id)
    {
        $livre = livre::findOrFail($id);
        $livre->update($request->all());
        return redirect('/livres');
    }

    public function destroy($id)
    {
        $livre = livre::findOrFail($id);
        $livre->delete();
        return redirect('/livres');
    }
}
