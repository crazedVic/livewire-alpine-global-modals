<?php

namespace Database\Seeders;

use App\Models\Consultant;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory(50)->create();
        Consultant::factory(10)->create();
        $this->seedTaggables();
    }

    private function seedTaggables(){
        $faker = Factory::create();
        // create random number of tag assignments to each consultant
        for ($x = 1; $x <= 10; $x++ ) {
            $tags_count = random_int(1,11);
            for ($y = 1; $y <= $tags_count; $y++) {
                \DB::table('taggables')->insert([
                    'tag_id' => $faker->unique()->numberBetween(1,50),
                    'taggable_id' => $x,
                    'taggable_type' => "App\\Models\\Consultant"
                ]);
            }
            $faker->unique($reset = true);
        }
    }
}
