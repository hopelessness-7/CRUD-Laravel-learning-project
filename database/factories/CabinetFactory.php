<?php

namespace Database\Factories;

use App\Models\Cabinet;
use Illuminate\Database\Eloquent\Factories\Factory;

class CabinetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cabinet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cabinet_number'=>$this->faker->randomNumber(1,100),
        ];
    }
}
