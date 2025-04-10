<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;

    protected $table      = 'options';
    protected $primaryKey = 'id_option';
    protected $fillable   = ['id_question','description','is_correct'];

    /* RELATIONS */
    public function question() { 
        return $this->belongsTo(Question::class,'id_question','id_question'); 
    }

    public function userAnswers() { 
        return $this->hasMany(UserAnswer::class,'id_option','id_option'); 
    }
}
