<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentInfo;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentInfo::factory()->count(20)->create();
    }
}
