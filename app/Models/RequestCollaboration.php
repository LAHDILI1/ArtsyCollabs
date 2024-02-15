<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestCollaboration extends Model
{
    use HasFactory;
    public function users(){
        return $this->hasOne(User::class);
    }
    public function projects(){
        return $this->hasOne(Project::class);
    }
    protected $fillable = [
        'user_id',
        'project_id',
    ];
}
