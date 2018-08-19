<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['name', 'slug', 'parent'];

    public function pro(){
    	return $this->hasMany('\App\Models\Product', 'category_id', 'id');
    }
}
