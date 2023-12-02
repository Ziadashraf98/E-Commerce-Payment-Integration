<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::where('is_admin' , true)->delete();
        
        User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('12345'),
            'is_admin'=>true,
        ]);
    }
}
