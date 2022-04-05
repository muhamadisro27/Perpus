<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Major;
use App\Models\Profile;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Initial Student');
        $this->command->getOutput()->progressStart(20);

        foreach(range(1, 20) as $index) {
            $this->createStudent($index);
        }

        $this->command->getOutput()->progressFinish();
    }
    
    public function createStudent($value)
    {
        $number = 93201800 + $value;
        $profile = Profile::inRandomOrder()->first();
        $grade = Grade::inRandomOrder()->first();
        $major = Major::inRandomOrder()->first();

        $nim = str_pad($number,10,"0", STR_PAD_LEFT);

        Student::create([
            'profile_id' =>  $profile->id,
            'grade_id' => $grade->id,
            'major_id' => $major->id,
            'nim' => $number,
            'status' => true,
        ]);
    }
}
