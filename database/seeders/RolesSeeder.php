<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin','home_industri', 'suplier'];

        foreach ($roles as $item){
            DB::table('roles')->insert([
    			'role_name' => $item,
    			
    		]);
        }
    }
}
