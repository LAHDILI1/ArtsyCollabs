<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function partners(){
        return $this->belongsToMany(Partner::class);
    }
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function request_collaborations(){
        return $this->belongsTo(RequestCollaboration::class);
    }

    protected $fillable = [
        'title',
        'description',
        'image_url',   
    ];
}
