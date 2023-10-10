<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'name' => 'sai',
            'email' => 'sai@gmail.com',
            'phone' => '9502734186',
            'message' => 'lorem 123 @ gmail.cpm',
        ]);
    }
}
