<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'sex',
        'bulletin',
        'description',
        'area_id'
    ];

    public function area(){
        return $this->belongsTo(Area::class);
    }

    protected function setRolAttribute($value){
        $this->attributes['rol'] = json_encode($value);
    }
    protected function getRolAttribute($value){
        return $this->attributes['rol'] = json_encode($value);
    }

    public function rol(){
        return $this->belongsToMany(Rol::class,'employees_roles');
    }
    

}
