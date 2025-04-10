<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, SoftDeletes;

    protected $table      = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable   = ['first_name','lastname_name','email','password','gender','birthdate','country','role','active'];
    protected $hidden     = ['password'];

    /* RELATIONS */
    public function quizResults() { 
        return $this->hasMany(QuizResult::class,'id_user','id_user'); 
    }
}
