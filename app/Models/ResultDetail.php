<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResultDetail extends Model
{
    use SoftDeletes;

    protected $table      = 'result_details';
    protected $primaryKey = 'id_result_detail';
    protected $fillable   = ['id_quiz_result','description'];

    /* RELATIONS */
    public function quizResult() { 
        return $this->belongsTo(QuizResult::class,'id_quiz_result','id_quiz_result'); 
    }

    public function aoe() { 
        return $this->belongsTo(AOE::class,'id_aoe','id_aoe'); 
    }
}
