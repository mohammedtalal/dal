<?php

namespace App\Http\Controllers\Api;

use App\Branch;
use App\Category;
use App\Company;
use App\Http\Controllers\Api\ApiBaseController as ApiBaseController;
use App\Interval;
use Illuminate\Http\Request;


class CategoriesApiController extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAll() {
        $date = request('date');
        // $dateFormated = str_replace(" ", ",", $date);
        
        $categories = Category::where('created_at', '>', date($date))
                                ->orWhere('updated_at', '>', date($date))
                                ->get();
        $companies  = Company::where('created_at', '>', date($date))
                                ->orWhere('updated_at', '>', date($date))
                                ->get();
        $branches  = Branch::where('created_at', '>', date($date))
                                ->orWhere('updated_at', '>', date($date))
                                ->get();
        $intervals = Interval::pluck('interval');

        $numberOfCategory = count($categories);     
        $numberOfCompanies = count($companies);     
        $numberOfBranches = count($branches);  

        if (empty($numberOfCategory) && empty($numberOfCompanies) && empty($numberOfBranches))
            return $this->sendError('Data not found.');

        return $this->sendResponse(['categories'=>$categories ,'companies' => $companies, 'branches' => $branches, 'interval'  => $intervals], 'Data Retrived successfully');
    }

}