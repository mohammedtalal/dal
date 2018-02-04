<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;
use Intervention\Image\ImageManagerStatic as Image ;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    
    public function index() {
    	$companies = Company::orderBy('id','asc')->paginate(10);
    	return view('companies.index',compact('companies'));
    }

	public function create() {
        $categories = Category::where('parent_id', '=',0)->get();
    	return view('companies.create',compact('categories'));
    }

    public function store() {
        $companyRequest = new CompanyRequest ;
        $companyRequest->persistCreateCompany();
    	return redirect()->route('companies.index')->with('success','Company Created Successfully');
    }

    public function edit( $id) {
    	$company = Company::find($id);
        $categories = Category::all();
        
    	return view('companies.edit',compact('company','categories'));
    }

    public function update( $id) {
        $companyRequest = new CompanyRequest;
    	$companyRequest = Company::find($id);
        $oldImagePath = public_path('images/companies/'. $companyRequest->company_image);
        if(! is_null($oldImagePath)) {
            File::delete($oldImagePath);
        }
        
        $image = request()->file('company_image');
        $imageName = str_random(50).$image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(50, 50);
        $image_resize->save(public_path('images/companies/'.$imageName));

        $companyRequest->category_id = request('category_id');
        $companyRequest->name = request('name');
        $companyRequest->address = request('address');
        $companyRequest->phone = request('phone');
        $companyRequest->description = request('description');
        $companyRequest->company_image  = $imageName;
        $companyRequest->lat   = request('lat');
        $companyRequest->long   = request('long');
        $companyRequest->save();

    	return redirect()->route('companies.index')->with('success','Company Updated successfully');
    }

    public function destroy($id) {
       	$company = Company::with('branches')->find($id);
        // delete related branches
        $company->branches()->delete();

        $oldImagePath = public_path('images/companies/'. $company->company_image);
        if(! is_null($oldImagePath)) {
            File::delete($oldImagePath);
        }

        $company->delete();
    	return redirect()->route('companies.index')->with('danger','Deleted Company successfully');
    }
}
