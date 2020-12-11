<?php

namespace Database\Seeders;

use DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $faker = Faker::create('id_ID');

            for($i = 1; $i<20; $i++) {

            DB::table('orders')->insert([
                'order_name' => $faker->company,
                'order_price' => $faker->randomDigit,
            ]);
            /*
            DB::table('orders')->insert([
                'order_name' => $faker->name,
            ]);
            */
        
        }
    }
}
