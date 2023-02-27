<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BootController extends Controller
{
    public function index()
    {
        if (Pokemon::exists()) {
            $pokes = Pokemon::all();

            return view('welcome',
                // ['pokes' => $pokes]
            );
        } else {
            // GET request the 151 original pokemon
            $response = Http::get('https://pokeapi.co/api/v2/pokemon?limit=151');
            // JSON decode the body from the response
            $pokes = json_decode($response->body());
            // Turn the response into a collection to allow iteration
            $collection = collect($pokes->results);
            // Iterate over each Pokemon and save the name and url to the DB
            foreach ($collection as $pokemon) {
                Pokemon::firstOrCreate(
                    ['name' => $pokemon->name],
                    ['url' => $pokemon->url],
                );
            }
        }

        return view('welcome'
            // , ['pokes' => $pokes]
        );
    }
}
