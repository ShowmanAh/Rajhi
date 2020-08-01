<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTableSeeder::class);
         $this->call(LanguagesTableSeeder::class);
         $this->call(SpecializationTableSeeder::class);
         $this->call(SubspecializationTableSeeder::class);
         $this->call(InsuranceCompanySeeder::class);
         $this->call(CityTableSeeder::class);
         $this->call(AreaTableSeeder::class);
        // $this->call(CenterTableSeeder::class);
    }
}



