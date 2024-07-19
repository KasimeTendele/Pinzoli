<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    protected $guarded=[];

    use HasFactory;
    public function defunts()
    {
        return $this->hasMany(Defunt::class);
    }
}
