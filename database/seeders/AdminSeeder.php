<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $admin->name= 'Phú Việt Lê';
        $admin->email= 'levietphu171993@gmail.com';
        $admin->password= Hash::make('a0107193');
        $admin->save();
    }
}
