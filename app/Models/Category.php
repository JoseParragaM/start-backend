<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $table      = 'categories';
    protected $primaryKey = 'id_category';
    protected $fillable   = ['name','description','image','active'];

    /* RELATIONS */
    public function subcategories() { 
        return $this->hasMany(Subcategory::class,'id_category','id_category'); 
    }
}
