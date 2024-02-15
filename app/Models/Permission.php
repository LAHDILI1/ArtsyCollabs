<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    public function Role(){
        return $this->belongsToMany(Role::class);
    }

    protected $fillable = [
        'permissions_name',
    ];

}
