<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;

class SubspecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('subspecializations')->insert([
        ['name' => 'اسنان اطفال'             , 'specialization_id' => Specialization::where('name' , 'أسنان')->first()->id ] ,
        ['name' => 'تجميل اسنان'             , 'specialization_id' => Specialization::where('name' , 'أسنان')->first()->id ] ,
        ['name' => 'زراعة اطفال'             , 'specialization_id' => Specialization::where('name' , 'أسنان')->first()->id ] ,
        ['name' => 'تركيبات اطفال'           , 'specialization_id' => Specialization::where('name' , 'أسنان')->first()->id ] ,
        ['name' => 'باطنة عامة'             , 'specialization_id' => Specialization::where('name' , 'باطنة')->first()->id ] ,
        ['name' => 'جهاز هضمي'               , 'specialization_id' => Specialization::where('name' , 'باطنة')->first()->id ] ,
        ['name' => ' أمراض معدية'            , 'specialization_id' => Specialization::where('name' , 'باطنة')->first()->id ] ,
        ['name' => 'سكر وغدد صماء '          , 'specialization_id' => Specialization::where('name' , 'باطنة')->first()->id ] ,
        ['name' => 'ليزك وتصحيح الابصار '     , 'specialization_id' => Specialization::where('name' , 'عيون')->first()->id ] ,
        ['name' => 'لمياة البيضاء'           , 'specialization_id' => Specialization::where('name' , 'عيون')->first()->id ] ,
        ['name' => 'جراحة شبكية وجسم زجاجي' , 'specialization_id' => Specialization::where('name' , 'عيون')->first()->id ] ,
        ['name' => 'تأهيل بصري'              , 'specialization_id' => Specialization::where('name' , 'عيون')->first()->id ] ,
        ['name' => ' جراحة تجميل العيون'    , 'specialization_id' => Specialization::where('name' , 'جلدية')->first()->id ] ,
        ['name' => 'جراحة تجميل الوجه'     , 'specialization_id' => Specialization::where('name' , 'جلدية')->first()->id ] ,
        ['name' => 'جراحة تجميل اليد'       , 'specialization_id' => Specialization::where('name' , 'جلدية')->first()->id ] ,

              ]);
    }
}
