<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes;

    protected $table      = 'subcategories';
    protected $primaryKey = 'id_subcategory';
    protected $fillable   = ['id_category','name','description','image','active'];

    /* RELATIONS */
    public function category() { 
        return $this->belongsTo(Category::class,'id_category','id_category'); 
    }

    public function questions() { 
        return $this->hasMany(Question::class,'id_subcategory','id_subcategory'); 
    }
}
