<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'name'          => 'administrador',
            'display_name'  =>'Administrador',
            'guard_name'    =>'web',
        ]);

        DB::table('roles')->insert([
            'name'          =>'user',
            'display_name'  =>'Usuario Normal',
            'guard_name'    =>'web',
        ]);

    }
}
