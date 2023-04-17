<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Investiment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'abbreviation',
        'description'
    ];

    public function getAbbreviationUpper()
    {
        return Str::upper($this->abbreviation);
    }
}