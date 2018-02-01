<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\uploadImage;
use App\Interfaces\CategoryRepositoryInterface as CategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image ;


class CategoryController extends Controller
{
    public $category;
    public function __construct(CategoryInterface $category) {
        $this->category = $category;
    }


    public function index() {
    	$categories = Category::where('parent_id', '=', 0)->with('children')->orderBy('id','asc')->paginate(10);
    	return view('categories.index',compact('categories'));
    }

	public function create() {
        $categories = Category::where('parent_id', '=', 0)->get();
    	return view('categories.create',compact('categories'));
    }

    public function store() {
        $catRequest = new CategoryRequest;
        $catRequest->persistCreateCategory();
    	return redirect()->route('categories.index')->with('success','Category Created Successfully');
    }

    public function edit($id) {
    	$category = $this->category->findCat($id);
    	return view('categories.edit',compact('category'));
    }


    public function update(CategoryRequest $catRequest, $id) {
    	$catRequest = $this->category->findCat($id);
        $oldImagePath = public_path('/images/categories/'. $catRequest->category_image);
        if(! is_null($oldImagePath)) {
            File::delete($oldImagePath);
        }
      
        $category = new Category; 
        // store image and resize it
        $image = request()->file('category_image');
        $imageName = str_random(50).$image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(50, 50);
        $image_resize->save(public_path('/images/categories/').$imageName);
        
        $catRequest->name = request('name');
        $catRequest->description = request('description');
        $catRequest->category_image = $imageName;
        $catRequest->save();

    	return redirect()->route('categories.index')->with('success','Category Updated successfully');
    }

    public function destroy($id) {
       	$category = $this->category->findCat($id);
        $oldImagePath = public_path('images/categories/'. $category->category_image);
        if(! is_null($oldImagePath)) {
            File::delete($oldImagePath);
        }
    	$category->delete();
    	return redirect()->route('categories.index')->with('danger','Deleted Category successfully');
    }
}
