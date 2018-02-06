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
         $path = public_path('images/'.$imageName);
         return response()->download($path);   
    }

    public function getAll() {
        $date = request('date');
        
        // variables that responsible for deleted at column
        $trashedCategory =  Category::onlyTrashed()->where('deleted_at', '>', date($date))->get();                               
        $trashedCompanies = Company::onlyTrashed()->where('deleted_at', '>', date($date))->get();
        $trashedBranches =  Branch::onlyTrashed()->where('deleted_at', '>', date($date))->get();
        
        // count number of trashed items in each table
        $numberOfTrashedCategory = count($trashedCategory);     
        $numberOfTrashedCompanies = count($trashedCompanies);     
        $numberOfTrashedBranches = count($trashedBranches);  

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

        // count number of items in each table
        $numberOfCategory = count($categories);     
        $numberOfCompanies = count($companies);     
        $numberOfBranches = count($branches);  

        if (empty($numberOfCategory) && empty($numberOfCompanies) && empty($numberOfBranches) && empty($numberOfTrashedCategory) && empty($numberOfTrashedCompanies) 
            && empty($numberOfTrashedBranches)) {
            return $this->sendError('Data not found.');
        }

        /*
        * first [] contain result of  CreatedOrUpdated items  
        * second [] contain result of Deleted items
        * third value contain message of response
        * fourth value contain interval  value
        */
        return $this->sendResponse(['categories'=>$categories ,'companies' => $companies, 'branches' => $branches ]
            ,['categories' => $trashedCategory, 'companies' => $trashedCompanies, 'branches' => $trashedBranches ]
            ,'Data Retrived successfully'
            ,$integer_interval);
    }

}