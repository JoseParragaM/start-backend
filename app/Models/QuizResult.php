<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizResult extends Model
{
    use SoftDeletes;

    protected $table      = 'quiz_results';
    protected $primaryKey = 'id_quiz_result';
    protected $fillable   = ['id_user','completion_date','total_score','loe_obtained'];

    /* RELATIONS */
    public function user() { 
        return $this->belongsTo(User::class,'id_user','id_user');
    }

    public function resultDetails() { 
        return $this->hasMany(ResultDetail::class,'id_quiz_result','id_quiz_result'); 
    }

    public function userAnswers() { 
        return $this->hasMany(UserAnswer::class,'id_quiz_result','id_quiz_result'); 
    }
}
