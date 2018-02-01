<?php

namespace App;

use App\Company;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Intervention\Image\ImageManagerStatic as Image ;


class Category extends Model
{
    
    use SoftDeletes;

    protected $table = "categories";
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'image',
        'parent_id'
    ];


    /*
		A Category hasMany companies,
		A company belongsTo Category
    */
    public function companies() {
    	return $this->hasMany(Company::class);
    }

    public function parent_category() {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

}
