<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
    	$companies = Company::all();
    	return view('companies.index',compact('companies'));
    }

	public function create() {
        $categories = Category::all();
    	return view('companies.create',compact('categories'));
    }

    public function store() {
          

		Company::create(request()->all());
    	return redirect()->route('companies.index')->with('success','Company Created Successfully');
    }

    public function edit($id) {
    	$company = Company::find($id);
        $categories = Category::all();
        
    	return view('companies.edit',compact('company','categories'));
    }

    public function update($id) {
    	$companies = Company::find($id);
        $companies->update(request()->all());
    	return redirect()->route('companies.index')->with('success','Company Updated successfully');
    }

    public function destroy($id) {
       	$company = Company::find($id);
        $company->delete();
    	return redirect()->route('companies.index')->with('danger','Deleted Company successfully');
    }
}
