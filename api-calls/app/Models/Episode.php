<?php

namespace App\Models;

class Episode
{
    public string $name;
    public ?string $imageUrl;
    public int $season;
    public int $episode;
    public string $summary;

    public function __construct($name, $imageUrl, $season, $episode, $summary)
    {
        $this->name = $name;
        $this->imageUrl = $imageUrl;
        $this->season = $season;
        $this->episode = $episode;
        $this->summary = $summary;
    }
}
