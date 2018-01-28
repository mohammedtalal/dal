<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoriesTest extends TestCase
{
    /**
     * Test home url (admin).
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('admin');
        $response->assertStatus(200);
    }

    /**
     * Test  categories view response.
     *
     * @return void
     **/
    public function testCategories ()
    {
    	$response = $this->get('admin/categories');
    	$response->assertStatus(200);
    }

    /**
     * Test add category function
     *
     * @return void
     **/
    public function testCreateCategories ()
    {
		$response = $this->get('admin/categories/create');
    	$response->assertStatus(200);

    }

    /**
     * Test add category function
     *
     * @return void
     **/
    public function testUpdateCategories ()
    {

    	$response = $this->json('POST', 'admin/categories/store', [
    		'parent_id'		=>	'0',
    		'name'			=>	'talal',
    		'desription'	=>	'hi guys ',
    		'category_image'	=>	UploadedFile::fake()->image('bla.jpg'),
    	]);
    
    }

    /**
     * Test Api response
     *
     * @return void
     */
    public function testApi()
    {
    	$response = $this->json('POST','/api/categories',['date' => '2018-01-22 14:07:04']);
    	$response->assertStatus(200); 
    }
}
