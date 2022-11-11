<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\AdminSocialMedia;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
        	'firstname' => 'Bikman',
            'lastname' =>'Djuma',
            'gender' => 'male',
            'phone' => '0785389000',
            'nationality' => 'Rwanda',
            'image' => 'user.png',
            'email' => 'admin@gmail.com',
            'password'=>bcrypt('admin123@'),
        ]);

        AdminSocialMedia::create([
            'address' => 'address',
            'phone' =>'0785389000',
            'email' => 'email@gmail.com',
            'facebook' => 'facebook',
            'instagram' => 'instagram',
            'whatsapp' => '0785389000',
            'twitter' => 'twitter',
            'linkdin'=>'linkdin',
        ]);
    }
}
