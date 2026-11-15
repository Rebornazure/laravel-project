<?php

namespace Database\Seeders;

use FactoryCall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Classroom;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    // buat kelas berelasi dengan students
    // pembuatan classroom tidak boleh melebihi isian data dari classroom
    public function run(): void
    {
        Classroom::Factory(10)
        ->hasStudents(5) // setiap kelas punya 5 siswa
        ->create();
    }
}
