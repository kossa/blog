<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $data = [];
        
        for($i = 1; $i <= 5 ; $i++) {
            array_push($data, [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt(123456),
            ]);
        }
        
        DB::table('users')->insert($data);
    }
}
