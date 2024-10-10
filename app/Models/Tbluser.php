<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbluser extends Model
{
    public $table="tbluser";
    public $fillable=['name','gender','checkbox','city','img'];

    public function connect(){
        return $this->hasOne(City::class,'id','city');
    }
}
