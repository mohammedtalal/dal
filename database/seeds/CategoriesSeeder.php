<?php

use App\Category;
use App\Company;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Let's truncate our existing records to start from scratch.
        \App\Category::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few categories in our database:
        // $faker->imageUrl($width = 200, $height = 200)
        for ($i = 0; $i < 100; $i++) {
            Category::create([
                'name' => $faker->company,
		        'description' => $faker->paragraph,
		        'category_image'	=>	"1H5LLpB3YtUvkpstFns3oaeIPF0pa8u3ONt7D3LCRqo3vxtLKCimg.jpg",
		        'parent_id'	=>	random_int($i[1], 50),
            ]);
        }

    }
}