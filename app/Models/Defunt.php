<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defunt extends Model
{
    protected $guarded=[];

    use HasFactory;
    public function cimetiere()
    {
        return $this->belongsTo(Cimetiere::class);
    }
    public function famille()
    {
        return $this->belongsTo(Famille::class);
    }
    public function hommages()
    {
        return $this->hasMany(Hommage::class);
    }
}
