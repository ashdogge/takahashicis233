<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{

    protected $fillable = [
        'name',
        'image',
        'season',
        'summary',
        'show_number',
    ];
    
    // ~~ Old Episode model code ~~
        // public string $name;
        // public string $imageUrl;
        // public int $season;
        // public int $episode;
        // public string $summary;

        // public int $show_number;

        // public function __construct($name, $imageUrl, $season, $episode, $summary, $show_number)
        // {
        //     $this->name = $name;
        //     $this->imageUrl = $imageUrl;
        //     $this->season = $season;
        //     $this->episode = $episode;
        //     $this->summary = $summary;
        //     $this->show_number = $show_number;
        // }
    // ~~                      ~~
}

