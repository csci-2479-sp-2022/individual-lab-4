<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGames extends Model
{
    use HasFactory;

    public function system()
    {
        return $this->belongsTo(System::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }

        // this accessor will render the boolean value as a yes/no string in our html table
    public function completedYesNo(): Attribute
    {
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['completed'] ? 'Yes' : 'No'
        );
    }

    // this function will render the categories for each game as a comma-separated list
    public function categoryList(): string
    {
        $catList = [];

        foreach ($this->categories as $category) {
            array_push($catList, $category['name']);
        }

        return implode(', ', $catList);
    }
}
