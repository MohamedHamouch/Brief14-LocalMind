<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $answers = [
            // Answers for Casablanca restaurants question
            [
                'question_id' => 1,
                'user_id' => 3,
                'content' => 'You should try "La Sqala" in the old medina. They have amazing traditional Moroccan dishes and the atmosphere is wonderful. Don\'t miss their seafood pastilla!',
            ],
            [
                'question_id' => 1,
                'user_id' => 4,
                'content' => 'I recommend "Rick\'s Cafe". While it\'s touristy, the food is excellent and the ambiance is unique. Their tajine is particularly good.',
            ],
            
            // Answers for Marrakech activities question
            [
                'question_id' => 2,
                'user_id' => 5,
                'content' => 'Definitely visit Jardin Majorelle early in the morning to avoid crowds. The colors are amazing and it\'s very peaceful. Also, don\'t miss the evening food stalls at Jemaa el-Fnaa!',
            ],
            
            // Answers for Rabat coworking question
            [
                'question_id' => 3,
                'user_id' => 2,
                'content' => 'Check out "Work Inn" near Hassan. They have great facilities, fast internet, and the community is very friendly. They also organize networking events.',
            ],
            
            // Answers for Tangier beaches question
            [
                'question_id' => 4,
                'user_id' => 3,
                'content' => 'Achakkar Beach is beautiful and less crowded than the city beaches. It\'s about 20 minutes from the city center but worth the trip. The water is crystal clear!',
            ],
            
            // Answers for Fez shopping question
            [
                'question_id' => 5,
                'user_id' => 4,
                'content' => 'The best leather goods are found in the Chouara Tannery area, but make sure to negotiate prices. For ceramics, head to the pottery district near Bab Ftouh. Always start by offering 1/3 of the initial asking price.',
            ],
        ];

        foreach ($answers as $answer) {
            DB::table('answers')->insert([
                'question_id' => $answer['question_id'],
                'user_id' => $answer['user_id'],
                'content' => $answer['content'],
                'answered_at' => Carbon::now()->subDays(rand(1, 15)),
                'created_at' => Carbon::now()->subDays(rand(1, 15)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
