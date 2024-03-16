<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Iluminate\Support\Facades\Has;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Admin\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'      => 'Administrador Polo',
            'email'     =>'admin@gmail.com',
            'avatar'    => '/assets/img/funcionarios/default.png',
            'telefone'  => '935378674',
            'password'  => bcrypt('1234'),
        ])->roles()->attach(1);

    }
}
