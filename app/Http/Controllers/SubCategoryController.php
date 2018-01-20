<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index() {
    	$subCategories = Category::where('parent_id', '!=', 0)->get();

    	return view('subCategories.index',compact('subCategories'));
    }

    public function create() {
    	// $subCategories = Category::where('parent_id', '!=', null)->get();

    	return view('subCategories.create',compact('subCategories'));
    }
}
