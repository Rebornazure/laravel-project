<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Student::factory()->create([
        //     'name'=> 'lu sapa mpruy',
        //     'email'=> 'lusapampruy@gmail.com',
        // ]);
        $this->call([
            ClassroomSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class
        ]);

        // Classroom::factory(15)
        // ->hasStudents(4)
        // ->create();

        // Subject::factory(6)
        // ->hasTeachers(3)
        // ->create();
    }
}
