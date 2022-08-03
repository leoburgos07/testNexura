<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function employee(){
        return $this->belongsToMany(Employee::class,'employees_roles');
    }
}
