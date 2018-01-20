<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'address',
        'phone',
        'company_id',
        'lat',
        'lang'
    ];

    /*
		Each Branche belongTo Company
		Each company hasMany Branches
    */
    public function companies() {
    	return $this->belongsTo(Company::class,'company_id','id');
    }
}
