<?php

use Illuminate\Database\Seeder;
Use App\Post;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 30; $i++) {
            $faker = Faker\Factory::create();
            Post::create(
                [
                    "title" => $faker->realText($maxNbChars = 30, $indexSize = 1),
                    "slug" => $faker->numerify('Hello ###'),
                    "body" => $faker->paragraph($nbSentences = 100, $variableNbSentences = true)
                ]
            );
        }
    }
}
