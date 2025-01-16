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


        return $episodesCollection->map(function ($episode) use ($showNumber) {
            // Use firstOrCreate to make sure episodes aren't added multiple times. This way, 
            // if we access the same show multiple times, we don't store duplicate data.
            return Episode::firstOrCreate(
                //Check for existing records
                [
                    'name' => $episode['name'],
                    'season' => $episode['season'],
                    'show_number' => $showNumber,
                ],
                // Additional attributes to set if creating a new record
                [
                    'image' => $episode['image']['medium'] ?? null,
                    'summary' => strip_tags($episode['summary']),
                ]
            );
        });
    }
    // Additional function to fetch the show name
    public static function fetchShowName($showNumber)
    {
        $showName = Http::get("https://api.tvmaze.com/shows/$showNumber")->json();
        return $showName["name"];
    }

}