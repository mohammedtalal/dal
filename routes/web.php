<?php


		Auth::routes();
		Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );



		Route::group([ 'middleware'	=> ['web','auth']] , function() {
			
			Route::get('admin','HomeController@index')->name('admin');

		// Start Categories Controller Routes
			Route::get('admin/categories','CategoryController@index')->name('categories.index');
			Route::get('admin/categories/create','CategoryController@create')->name('categories.create');
			Route::post('admin/categories/store','CategoryController@store')->name('categories.store');
			Route::get('admin/categories/edit/{id}','CategoryController@edit')->name('categories.edit');
			Route::post('admin/categories/update/{id}','CategoryController@update')->name('categories.update');
			Route::delete('admin/categories/delete/{id}','CategoryController@destroy')->name('categories.destroy');
		// End Categories Controller Routes


		// Start Sub-Categories Controller Routes
			Route::get('admin/subCategories','SubCategoryController@index')->name('subCategories.index');
			Route::get('admin/subCategories/create','SubCategoryController@create')->name('subCategories.create');
			Route::post('admin/subCategories/store','SubCategoryController@store')->name('subCategories.store');
			Route::get('admin/subCategories/edit/{id}','SubCategoryController@edit')->name('subCategories.edit');
			Route::post('admin/subCategories/update/{id}','SubCategoryController@update')->name('subCategories.update');
			Route::delete('admin/subCategories/delete/{id}','SubCategoryController@destroy')->name('subCategories.destroy');
		// End Sub-Categories Controller Routes

		// Start Companies Controller Routes
			Route::get('admin/companies','CompanyController@index')->name('companies.index');
			Route::get('admin/companies/create','CompanyController@create')->name('companies.create');
			Route::post('admin/companies/store','CompanyController@store')->name('companies.store');
			Route::get('admin/companies/edit/{id}','CompanyController@edit')->name('companies.edit');
			Route::post('admin/companies/update/{id}','CompanyController@update')->name('companies.update');
			Route::delete('admin/companies/delete/{id}','CompanyController@destroy')->name('companies.destroy');
		// End Companies Controller Routes

		// Start Branches Controller Routes
			Route::get('admin/branches','BranchController@index')->name('branches.index');
			Route::get('admin/branches/create','BranchController@create')->name('branches.create');
			Route::post('admin/branches/store','BranchController@store')->name('branches.store');
			Route::get('admin/branches/edit/{id}','BranchController@edit')->name('branches.edit');
			Route::post('admin/branches/update/{id}','BranchController@update')->name('branches.update');
			Route::delete('admin/branches/delete/{id}','BranchController@destroy')->name('branches.destroy');
		// End Branches Controller Routes

		// Start Interval controller Routes
			Route::get('admin/intervals','IntervalController@index')->name('intervals.index');
			Route::get('admin/intervals/create','IntervalController@create')->name('intervals.create');
			Route::post('admin/intervals/store','IntervalController@store')->name('intervals.store');
			Route::get('admin/intervals/edit/{id}','IntervalController@edit')->name('intervals.edit');
			Route::post('admin/intervals/update/{id}','IntervalController@update')->name('intervals.update');
			Route::delete('admin/intervals/delete/{id}','IntervalController@destroy')->name('intervals.destroy');
		// End Interval Controller Routes

		});

