<?php

use App\Models\City;
use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('areas')->insert([
        ['name'=>'طهطا',    'city_id' => City::where('name','سوهاج')->first()->id],
        ['name'=>'طما',    'city_id' => City::where('name','سوهاج')->first()->id],
        ['name'=>'المراغه',    'city_id' => City::where('name','سوهاج')->first()->id],
        ['name'=>'صدفا',    'city_id' => City::where('name','اسيوط')->first()->id],
        ['name'=>'ابوتيج',    'city_id' => City::where('name','اسيوط')->first()->id],
        ['name'=>'شطب',    'city_id' => City::where('name','اسيوط')->first()->id],
        ['name'=>'قوص',    'city_id' => City::where('name','قنا')->first()->id],
        ['name'=>'ابوتشت',    'city_id' => City::where('name','قنا')->first()->id],
        ['name'=>'الزهراء',    'city_id' => City::where('name','القاهره')->first()->id],

       ]);
    }
}
