<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $numberOfProducts = 100;
        $numberOfReviews = 300;

        factory('App\Model\Product', $numberOfProducts)->create();
        factory('App\Model\Review', $numberOfReviews)->create();
    }
}
