<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VideoGame;

class System extends Model
{
    use HasFactory;

    public function videoGames()
    {
        return $this->hasMany(VideoGame::class);
    }


}
