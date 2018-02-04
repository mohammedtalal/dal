<?php

use App\Category;
use App\Company;
use Illuminate\Database\Seeder;

class CompnaiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      // Let's truncate our existing records to start from scratch.
        \App\Company::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few companies in our database:
        for ($i = 0; $i < 100; $i++) {
            Company::create([
                'name' => $faker->company,
                'address'	=>$faker->address,
                'phone'	=>$faker->phoneNumber,
		        'description' => $faker->paragraph,
		        'Company_image'	=>	"1H5LLpB3YtUvkpstFns3oaeIPF0pa8u3ONt7D3LCRqo3vxtLKCimg.jpg",
		        'lat'	=>	$faker->latitude,
		        'long'	=>	$faker->longitude,
		        'category_id'	=>	 Category::all()->random()->id,
            ]);
        }  

    }
}
