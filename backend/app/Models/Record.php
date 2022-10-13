<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Record extends Model
{
    use HasFactory;
    protected $table = 'records';
    protected $fillable =[
        'answers',
        'user_id'
    ];

     public function user(){
         return $this->hasMany(User::class,'user_id',id);
     }
}
