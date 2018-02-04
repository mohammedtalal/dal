<?php

namespace App;

use App\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    protected $table = "branches";
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'address',
        'phone',
        'company_id',
        'lat',
        'long'
    ];

    /*
		Each Branche belongTo Company
		Each company hasMany Branches
    */
    public function companies() {
    	return $this->belongsTo(Company::class,'company_id','id');
    }
}
