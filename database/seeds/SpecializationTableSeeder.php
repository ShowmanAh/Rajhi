<?php

use Illuminate\Database\Seeder;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->insert([
            ['name' => 'باطنة'] ,
            ['name' => 'أسنان'] ,
            ['name' => 'مخ وأعصاب'] ,
            ['name' => 'نفسي'] ,
            ['name' => 'جلدية'] ,
            ['name' => 'أورام'] ,
            ['name' => 'جراحة أطفال'] ,
            ['name' => 'أمراض دم'] ,
            ['name' => 'عيون'] ,
            ['name' => 'روماتيزم'] ,
            ['name' => 'طب الأسرة'] ,

       ]);
    }
}
