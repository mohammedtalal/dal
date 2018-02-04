<?php

use App\Branch;
use App\Company;
use Illuminate\Database\Seeder;

class BranchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        \App\Branch::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few companies in our database:
        for ($i = 0; $i < 100; $i++) {
            Branch::create([
                'address'	=>$faker->address,
                'phone'	=>$faker->phoneNumber,
		        'lat'	=>	$faker->latitude,
		        'long'	=>	$faker->longitude,
		        'company_id'	=>	 Company::all()->random()->id,
            ]);
        }  
    }
}
