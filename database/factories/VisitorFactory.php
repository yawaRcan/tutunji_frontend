<?php

namespace Database\Factories;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Visitor::class;
    public function definition()
    {
        return [
            'visited_date' => $this->faker->visited_date,
            'created_at' => $this->faker->created_at,
            'updated_at' => $this->faker->updated_at
        ];
    }
}
