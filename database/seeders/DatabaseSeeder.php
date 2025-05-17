<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $faker = Faker::create();
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'content' => $faker->text(),
                'image' => 'https://placehold.co/300',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 1,
                'content' => $faker->text(),
                'image' => 'https://placehold.co/300',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 1,
                'content' => $faker->text(),
                'image' => 'https://placehold.co/300',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'user_id' => 1,
                'content' => $faker->text(),
                'image' => 'https://placehold.co/300',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('likes')->insert([
            [
                'user_id' => 1,
                'post_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'post_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'post_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('comments')->insert([
            [
                'user_id' => 1,
                'post_id' => 1,
                'content' => $faker->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'post_id' => 2,
                'content' => $faker->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'post_id' => 3,
                'content' => $faker->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('messages')->insert([
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'message_content' => $faker->text(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 4,
                'message_content' => $faker->text(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
