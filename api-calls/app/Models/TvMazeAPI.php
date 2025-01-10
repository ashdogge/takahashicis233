<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class TvMazeAPI
{
    public static function fetch($showNumber)
    {
        $showData = Http::get("https://api.tvmaze.com/shows/$showNumber/episodes")->json();

        $episodesCollection = collect($showData);

        return $episodesCollection->map(function ($episodes) {
            return new Episode($episodes['name'], $episodes['image']['medium'], $episodes['season'], $episodes['id'], strip_tags($episodes['summary']));
        });

    }
}