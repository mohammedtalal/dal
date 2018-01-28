<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index() {
    	$branches  = Branch::paginate(10);
    	return view('branches.index',compact('branches'));
    }

	public function create() {
        $companies = Company::all();
    	return view ('branches.create',compact('companies'));
    }

    public function store(Request $request) {
		Branch::create($request->all());
    	return redirect()->route('branches.index')->with('success','Branch Created Successfully');
    }

    public function edit($id) {
    	$branch = Branch::find($id);
        $companies = Company::all();
    	return view('branches.edit',compact('branch','companies'));
    }

    public function update($id) {
    	$branch = Branch::find($id);
    	$branch->update(request()->all());
    	return redirect()->route('branches.index')->with('success','Category Updated successfully');
    }

    public function destroy($id) {
       	$branch = Branch::find($id);
    	$branch->delete();
    	return redirect()->route('branches.index')->with('danger','Deleted Category successfully');
    } 
}
