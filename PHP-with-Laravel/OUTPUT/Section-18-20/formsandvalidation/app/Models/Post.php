<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    public $directory = "/images/";

    use HasFactory;

    protected $fillable = ['title', 'path'];

    //old syntax for implenting Local Scopes
    // public static function scopeLatest($query){
    //     return $query->orderBy('id','asc')->get();
    // }

    //new syntax for implenting Local Scopes
    public static function scopeAscOrder(Builder $query){

       return $query->orderBy('id','asc')->get();

    }

    public function getPathAttribute($value){
        return $this->directory.$value;
    }
    

}
