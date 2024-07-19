<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hommage extends Model
{
    protected $guarded=[];

    use HasFactory;

 
    public function defunt()
    {
        return $this->belongsTo(Defunt::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
