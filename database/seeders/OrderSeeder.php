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

            for($i = 1; $i<3; $i++) {

            DB::table('orders')->insert([
                'order_name' => $faker->name,
                'order_price' => $faker->numberBetween($min = 50000, $max = 100000),
                'order_type' => 'Templates',
                'payment_type' => $faker->creditCardType,
                'created_at' => $faker->date($format = 'Y-m-d h:i:s', $max = 'now'),
                'status' => 'success',

            ]);
            /*
            DB::table('orders')->insert([
                'order_name' => $faker->name,
            ]);
            */
        
        }
    }
}
