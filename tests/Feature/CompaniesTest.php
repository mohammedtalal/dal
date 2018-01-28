<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CompaniesTest extends TestCase
{
   
    /**
     * Test  Companies view response.
     *
     * @return void
     **/
    public function testCompanies ()
    {
    	$response = $this->get('admin/companies');
    	$response->assertStatus(200);
    }

    /**
     * Test add companies function
     *
     * @return void
     **/
    public function testCreateCompanies ()
    {
		$response = $this->get('admin/companies/create');
    	$response->assertStatus(200);

    }

    /**
     * Test add companies function
     *
     * @return void
     **/
    public function testUpdateCompanies ()
    {

    	$response = $this->json('POST', 'admin/companies/store', [
    		'category_id'		=>	'0',
    		'name'			=>	'talal',
    		'desription'	=>	'hi guys ',
    		'company_image'	=>	UploadedFile::fake()->image('imageTest.jpg'),
    		'lat'			=>	rand(0,100), 
    		'lang'			=>	rand(0,100),
    		'phone'			=>	'01002569874',
    	]);
    
    }
}
