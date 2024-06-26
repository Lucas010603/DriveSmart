<?php

namespace Database\Factories\Instructor;

use App\Models\Instructor\Car;
use App\Models\Instructor\Instructor;
use App\Models\Instructor\Student;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    //generates fake lessons
    public function definition(): array
    {
        $faker = Faker::create('nl_NL');
        $filled = rand(0,100) > 10 ;
        $start = Carbon::now()->hour(9)->addDays(rand(-7, 7))->addMinutes(rand(0, 420)); // random date one week from now
        $end = $start->copy()->addHour();
        $instructorId = Instructor::inRandomOrder()->first()->id; // random instructor id
        $carId = Car::inRandomOrder()->first()->id; // random car id
        $student_id = Student::inRandomOrder()->first()->id; // random student id
        if($end->isPast()){ // if already passed than should be filled with data
            $filled = true;
        }
        return [
            "instructor_id" => $filled ? $instructorId : null,
            "car_id" => $filled ? $carId : null,
            "student_id" => $filled ? $student_id : null,
            "start" => $start->format("Y-m-d H:i"),
            "end" => $end->format("Y-m-d H:i"),
            "completed" => $end->isPast(),
            "report" => ($filled && $end->isPast()) ? $faker->text : "",
        ];
    }
}
