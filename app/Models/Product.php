<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['name', 'image', 'price', 'sale_price', 'content', 'category_id'];

    public function cate(){
    	return $this->hasOne('\App\Models\Category', 'id', 'category_id');
    }

    public function scopeSearch($query){
    	if (empty(request()->search)) {
    		return $query;
    	} else {
    		return $query->where('name', 'like', '%'.request()->search.'%');
    	}
    }
}
