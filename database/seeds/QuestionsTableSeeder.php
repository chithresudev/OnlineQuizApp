<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         // Question 1
         DB::table('questions')->insert([
            'question'=> 'If a=1 and b=2, what is a+b?',
            'option1' => '12',
            'option2' => '4',
            'option3' => '3',
            'option4' => '10',
            'answer'  => 'option3'
        ]);

         // Question 2
         DB::table('questions')->insert([
            'question'=> '10 / 5 = ?',
            'option1' => '5',
            'option2' => '2',
            'option3' => '7',
            'option4' => '3',
            'answer'  => 'option2'
        ]);

	       // Question 3
         DB::table('questions')->insert([
            'question'=> 'One of the following is not an open source software:',
            'option1' => 'DSpace',
            'option2' => 'Windows',
      	    'option3' => 'Green-stone',
      	    'option4' => 'Linux',
      	    'answer'  => 'option2'
        ]);

	       // Question 4
         DB::table('questions')->insert([
            'question'=> 'What is the collection of terms or records in MARC called?',
            'option1' => 'System',
            'option2' => 'Network',
      	    'option3' => 'Website',
      	    'option4' => 'Database',
      	    'answer'  => 'option4'
        ]);

	       // Question 5
         DB::table('questions')->insert([
            'question'=> 'Microchip was invented by_____________',
            'option1' => 'Microsoft',
            'option2' => 'IBM',
      	    'option3' => 'DELL',
      	    'option4' => 'Intel',
      	    'answer'  => 'option4'
        ]);
    }
}
