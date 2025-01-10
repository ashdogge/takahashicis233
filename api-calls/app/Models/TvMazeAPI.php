<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class TvMazeAPI
{
    public static function fetch($showNumber)
    {
        // call API & convert to json
        $showData = Http::get("https://api.tvmaze.com/shows/$showNumber/episodes")->json();
        $episodesCollection = collect($showData);
        //Map episode data into collection
        return $episodesCollection->map(function ($episodes) {
            return new Episode($episodes['name'], $episodes['image']['medium'], $episodes['season'], $episodes['number'], strip_tags($episodes['summary']));
        });

    }
    // Additional function to fetch the show name
    public static function fetchShowName($showNumber)
    {
        $showName = Http::get("https://api.tvmaze.com/shows/$showNumber")->json();
        return $showName["name"];
    }

}