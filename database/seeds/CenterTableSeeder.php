<?php

use App\Models\Area;
use Illuminate\Database\Seeder;

class CenterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('centers')->insert([
      ['name'=> 'الامانه', 'email'=>'amana@gmail.com','password'=>'123456', 'logo'=>'default.png','address'=>'tahta','about'=>'مركز الامانه لعلاج  الابصار باشعه الليزر'
       ],
      ['name'=> 'سكان للاشعه', 'email'=>'scan@gmail.com','password'=>'123456', 'logo'=>'default.png','address'=>'tema','about'=>'مركز الامانه لعلاج  الابصار باشعه الليزر']
      ,
      ['name'=> 'الرواد', 'email'=>'rwad@gmail.com','password'=>'123456', 'logo'=>'default.png','address'=>'tahta','about'=>'مركز الامانه    لتحاليل  الدم',
    ],

      ]);
    }
}
