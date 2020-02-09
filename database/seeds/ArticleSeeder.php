<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
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

        $users = App\User::pluck('id')->toArray();
        
        for($i = 1; $i <= 100 ; $i++) {
            $title = $faker->sentence(rand(6,10));
            array_push($data, [
                'title' => $title,
                'sub_title' => $faker->sentence(rand(10, 15)),
                'slug' => Str::slug($title),
                'body' => $faker->realText(4000),
                'published_at' => $faker->dateTime(),
                'user_id' => $faker->randomElement($users),
            ]);
        }
        
        DB::table('articles')->insert($data);
    }
}
