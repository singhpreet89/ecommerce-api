<?php

use Illuminate\Database\Seeder;
use App\Model\Product;
use App\Model\Review;

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

        factory(Product::class, $numberOfProducts)->create();
        factory(Review::class, $numberOfReviews)->create();
    }
}
