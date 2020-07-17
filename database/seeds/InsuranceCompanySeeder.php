<?php

use Illuminate\Database\Seeder;

class InsuranceCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('insurance_companies')->insert([
        ['name' => 'التامين الصحى'],
        ['name' => 'التضامن الاجتماعى'],
        ['name' => 'الاهرام'],
        ['name' => 'الاتصالات']
       ]);
    }
}
