<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $questions = [
            [
                'title' => 'Best restaurants in Casablanca?',
                'content' => 'I\'m looking for authentic Moroccan restaurants in Casablanca. Any recommendations for places with great tajine and couscous?',
                'place' => 'Casablanca',
                'user_id' => 2, // John Doe
            ],
            [
                'title' => 'Weekend activities in Marrakech',
                'content' => 'Visiting Marrakech this weekend. What are some must-see attractions and activities you would recommend?',
                'place' => 'Marrakech',
                'user_id' => 3, // Sarah Smith
            ],
            [
                'title' => 'Coworking spaces in Rabat',
                'content' => 'Can anyone recommend good coworking spaces in Rabat? Looking for somewhere with reliable internet and good coffee!',
                'place' => 'Rabat',
                'user_id' => 4, // Mike Johnson
            ],
            [
                'title' => 'Best beaches near Tangier',
                'content' => 'Planning a beach day near Tangier. Which beaches would you recommend for swimming and relaxation?',
                'place' => 'Tangier',
                'user_id' => 5, // Lisa Brown
            ],
            [
                'title' => 'Shopping in Fez medina',
                'content' => 'First time visiting Fez medina. What are the best spots for traditional crafts and where should I be careful about prices?',
                'place' => 'Fez',
                'user_id' => 2, // John Doe
            ],
        ];

        foreach ($questions as $question) {
            DB::table('questions')->insert([
                'title' => $question['title'],
                'content' => $question['content'],
                'place' => $question['place'],
                'user_id' => $question['user_id'],
                'published_at' => Carbon::now()->subDays(rand(1, 30)),
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}
