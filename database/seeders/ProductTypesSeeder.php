<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['kopi','buah', 'apel', 'teh', 'coklat', 'beras'];

        foreach($types as $item){
            DB::table('product_types')->insert([
                'product_type' => $item
            ]);
        }
    }
}
