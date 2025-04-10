<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AOE extends Model
{
    use SoftDeletes;

    protected $table      = 'aoes';
    protected $primaryKey = 'id_aoe';
    protected $fillable   = ['name','active'];

    /* RELATIONS */
    public function questions() { 
        return $this->hasMany(Question::class,'id_aoe','id_aoe'); 
    }

    public function resultDetail() { 
        return $this->hasMany(ResultDetail::class,'id_aoe','id_aoe'); 
    }
}
