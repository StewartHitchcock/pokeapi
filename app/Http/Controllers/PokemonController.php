<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        return Pokemon::get();
        // return Pokemon::orderBy('id', 'asc')->get();
    }

    public function show(Pokemon $pokemon)
    {
        return Pokemon::findOrFail($pokemon);
    }

    public function update(Request $request, Pokemon $pokemon)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'url' => 'required',
        // ]);

        // $pokemon = Pokemon::findOrFail($id);
        // $pokemon->name = $request->input('name');
        // $pokemon->url = $request->input('url');
        // $pokemon->update();

        $pokemon->update($request->all());

        return $pokemon;
    }

    public function destroy(Request $request, $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        if ($pokemon->delete()) {
            return 'deleted successfully';
        }
    }
}
