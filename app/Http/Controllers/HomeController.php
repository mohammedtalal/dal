<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Category;
use App\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategories = Category::all()->count();
        $allSubCategories = Category::where('parent_id', '!=', 0)->get()->count();
        $allCompanies  = Company::all()->count();
        $allBranches   = Branch::all()->count();
        return view('master',compact('allCategories','allSubCategories','allCompanies','allBranches'));
    }
}
