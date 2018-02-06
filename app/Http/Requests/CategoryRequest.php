<?php

namespace App\Http\Requests;

use App\Category;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image ;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'            => 'required',
            'description'     => 'required',
            'category_image'  => 'required|image|mimes:jpeg,bmp,png',
            'parent_id'       => 'required'
        ];
    }


    public function uploadImage() {
        $image = request()->file('category_image');
        $imageName = Carbon::now()->toDayDateTimeString().$image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(300, 300);
        $categoryImagesDirectory = public_path('images');

        if (! is_dir($categoryImagesDirectory) ) {
            File::makeDirectory(public_path(). '/' .'images',0777);
        } 
        $image_resize->save(public_path('images').$imageName);
        return $imageName;
    }

    public function persistCreateCategory() {
        $category = new Category; 

        if (request('parent_id') != 0 ) {
            $category->parent_id = request('parent_id');
        }

        $category->name = request('name');
        $category->description = request('description');
        $category->category_image = $this->uploadImage();
        $category->save();
    }

}
