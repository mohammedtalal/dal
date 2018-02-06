<?php

namespace App\Http\Requests;

use App\Company;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image ;
use Symfony\Component\HttpFoundation\File\getClientOriginalName;


class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'category_id' => 'required',
            'featured_image_id' => 'required',  
            'lat' => 'required|Numeric',
            'long' => 'required|Numeric'
        ];
    }

    public function uploadImage() {
        $image = request()->file('company_image');
        $imageName = Carbon::now()->timestamp.$image->getClientOriginalName();
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(50, 50);
        $companyImagesDirectory = public_path('images');

        if (! is_dir($companyImagesDirectory) ) {
            File::makeDirectory(public_path(). '/' .'images',0777);
        } 
        $image_resize->save(public_path('images/'.$imageName));
        return $imageName;
    }

    public function persistCreateCompany() {
        $company = new Company;
        $company->category_id = request('category_id');
        $company->name = request('name');
        $company->address = request('address');
        $company->phone = implode(',' , request('phone'));
        $company->description = request('description');
        $company->company_image =$this->uploadImage();
        $company->lat   = request('lat');
        $company->long   = request('long');
        dd($company->company_image);
        $company->save();
    }

}
