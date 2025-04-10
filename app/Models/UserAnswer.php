<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAnswer extends Model
{
    use SoftDeletes;

    protected $table      = 'user_answers';
    protected $primaryKey = 'id_user_answer';
    protected $fillable   = ['id_question','id_option','feedback'];

    /* RELATIONS */
    public function question() { 
        return $this->belongsTo(Question::class,'id_question','id_question'); 
    }

    public function option() { 
        return $this->belongsTo(Option::class,'id_option','id_option'); 
    }

    public function quizResult() { 
        return $this->belongsTo(QuizResult::class,'id_user_answer','id_user_answer'); 
    }
}
