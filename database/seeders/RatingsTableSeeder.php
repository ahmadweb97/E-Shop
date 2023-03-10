<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rating;


class RatingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ratingRecords = [
            ['id'=>1,'user_id'=>1, 'product_id'=>1, 'review'=>'Very good product', 'rating'=>4, 'status'=>0],
            ['id'=>2,'user_id'=>1, 'product_id'=>2, 'review'=>' excellent product', 'rating'=>5, 'status'=>0],
            ['id'=>3,'user_id'=>2, 'product_id'=>1, 'review'=>' product is not good', 'rating'=>1, 'status'=>0],
        ];

        Rating::insert($ratingRecords);
    }
}
