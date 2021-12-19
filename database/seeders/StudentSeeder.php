<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\student;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       student::create([
	    'name' => 'VIvek kumar',
	    'email' => 'vivekkumar240898@gmail.com',
	    'password' => 'pass@123',
	    'mobile' => '70528888451',
	    'address' => 'Azamgarh',
	   ]);
    }
}
