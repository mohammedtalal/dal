<?php

namespace App\Http\Controllers\Api;

use App\Branch;
use App\Category;
use App\Company;
use App\Http\Controllers\Api\ApiBaseController as ApiBaseController;
use App\Interval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;


class CategoriesApiController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function downloadImage($imageName) {
         $path = public_path('images/categories/'.$imageName);
         return response()->download($path);   
    }

    public function getAll() {
        $date = request('date');
        
        $categories = Category::where('created_at', '>', date($date))
                                ->orWhere('updated_at', '>', date($date))
                                ->orderBy('id','asc')
                                ->get();
        $companies  = Company::where('created_at', '>', date($date))
                                ->orWhere('updated_at', '>', date($date))
                                ->orderBy('id','asc')
                                ->get();
        $branches  = Branch::where('created_at', '>', date($date))
                                ->orWhere('updated_at', '>', date($date))
                                ->orderBy('id','asc')
                                ->get();
        $interval = Interval::pluck('interval');
        $integer_interval = $interval[0];
        $numberOfCategory = count($categories);     
        $numberOfCompanies = count($companies);     
        $numberOfBranches = count($branches);  

        if (empty($numberOfCategory) && empty($numberOfCompanies) && empty($numberOfBranches)) {
            return $this->sendError('Data not found.');
        }
        return $this->sendResponse(['categories'=>$categories ,'companies' => $companies, 'branches' => $branches], 'Data Retrived successfully', $integer_interval);
    }

}