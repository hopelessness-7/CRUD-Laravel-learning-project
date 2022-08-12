<?php

namespace Database\Factories;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Worker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'surname'=>$this->faker->lastName,
            'name'=>$this->faker->firstNameMale,
            'patronymic'=>$this->faker->firstNameFemale,
            'position_id'=>$this->faker->numberBetween(1,9),
        ];
    }
}
