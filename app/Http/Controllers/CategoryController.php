<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\uploadImage;
use App\Interfaces\CategoryRepositoryInterface as CategoryInterface;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image ;


class CategoryController extends Controller
{
    public $category;
    public function __construct(CategoryInterface $category) {
        $this->category = $category;
    }


    public function index() {
    	$categories = Category::where('parent_id', '=', 0)->with('children')->get();
    	return view('categories.index',compact('categories'));
    }

	public function create() {
        $categories = Category::where('parent_id', '=', 0)->get();
    	return view('categories.create',compact('categories'));
    }

    public function store(CategoryRequest $catRequest) {
        // $catRequest = new CategoryRequest;
        $catRequest->persistCreateCategory();
    	return redirect()->route('categories.index')->with('success','Category Created Successfully');
    }

    public function edit($id) {
    	$category = $this->category->findCat($id);
    	return view('categories.edit',compact('category'));
    }


    public function update(CategoryRequest $catRequest, $id) {
    	$catRequest = $this->category->findCat($id);
        // $cat = new Category ;
        // $catRequest->persistUpdateCategory();

    	return redirect()->route('categories.index')->with('success','Category Updated successfully');
    }

    public function destroy($id) {
       	$category = $this->category->findCat($id);
    	$category->delete();
    	return redirect()->route('categories.index')->with('danger','Deleted Category successfully');
    }
}
