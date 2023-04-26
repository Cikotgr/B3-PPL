<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BussinesTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bussines_type = ['beras', 'ketela', 'tembakau','gula' , 'kelapa'];

        foreach ($bussines_type as $item){
            DB::table('bussines_types')->insert([
                'bussines_type' => $item
            ]);
        }
    }
}
