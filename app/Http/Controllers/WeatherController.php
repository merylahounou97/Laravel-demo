<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class WeatherController extends Controller
{
    public function index()
    {
        $weather = Http::get("https://api.meteo-concept.com/api/forecast/daily?token=" . env("METEOR_API_TOKEN") . "&insee=72264");

        return view('weather.index')->with([
            'weather' => $weather
        ]);
    }

    public function search_city()
    {
        return view('weather.search_city');
    }

    public function list_city(Request $request)
    {
        $request->validate([
            'city' => 'required'
        ]);

        $list = Http::get("https://api.meteo-concept.com/api/location/cities?token=" . env("METEOR_API_TOKEN") . "&search=" . $request->city);

        return view('weather.list_city')->with([
            'list' => $list
        ]);
    }

    public function index_bis(Request $request)
    {
        $request->validate([
            'insee' => 'required'
        ]);

        $weather = Http::get("https://api.meteo-concept.com/api/forecast/daily?token=" . env("METEOR_API_TOKEN") . "&insee=" . $request->insee);

        return view('weather.index_bis')->with([
            'weather' => $weather
        ]);
    }
}
