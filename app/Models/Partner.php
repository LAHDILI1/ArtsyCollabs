<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    public function Project(){
        return $this->belongsToMany(Project::class);
    }

    protected $fillable = [
        'name_partner',
        'description',
    ];
}
