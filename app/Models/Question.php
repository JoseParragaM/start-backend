<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    protected $table      = 'questions';
    protected $primaryKey = 'id_question';
    protected $fillable   = ['id_subcategory','id_aoe','description','loc','active'];

    /* RELATIONS */
    public function subcategory() { 
        return $this->belongsTo(Subcategory::class,'id_subcategory','id_subcategory'); 
    }

    public function aoe() { 
        return $this->belongsTo(AOE::class,'id_aoe','id_aoe'); 
    }

    public function options() { 
        return $this->hasMany(Option::class,'id_question','id_question'); 
    }

    public function userAnswers() { 
        return $this->hasMany(UserAnswer::class,'id_question','id_question'); 
    }
}
