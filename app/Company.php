<?php

namespace App;

use App\Branch;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
	protected $table = "companies";
    protected $dates = ['deleted_at'];
    use SoftDeletes;
    
    protected $fillable = [
    	'name',
        'address',
        'phone',
        'description',
        'company_image',
        'category_id',
        'lat',
        'lang'
    ];

    /*
      *  Each Company belongs Category,
      * Each Category hasMany company
    */
    public function categories() {
    	return $this->belongsTo(Category::class,'category_id','id');
    }

    /*
      * Each company hasMany branches
      * Each branch belongsTo company
    */
    public function branches() {
        return $this->hasMany(Branch::class,'id');
    }

}
