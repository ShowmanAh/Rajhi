<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
        ['name'=> 'arabic', 'abbre' => 'ar', 'direction' => 'rtl', 'active' => 1],
        ['name'=> 'english', 'abbre' => 'en', 'direction' => 'ltr', 'active' => 1],
        ['name'=> 'french', 'abbre' => 'fr', 'direction' => 'ltr', 'active' => 1],
        ['name'=> 'german', 'abbre' => 'g', 'direction' => 'ltr', 'active' => 1],
        ]);
    }
}
