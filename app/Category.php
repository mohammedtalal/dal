<?php

namespace App;

use App\Company;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image ;


class Category extends Model
{
    protected $table = "categories";


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

     public function persistUpdateCategory() {
        $image = request()->file('category_image');
        $imageName = str_random(50).$image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(50, 50);
        $image_resize->save(public_path('images/Categories/').$imageName);

        $category = new Category; 
        $category->name = request('name');
        $category->description = request('description');
        $category->category_image = $imageName;
        $category->save();
    }
}
