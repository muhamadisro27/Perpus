<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * 
     * @return array<string, mixed>
     */
    protected $model = Profile::class;
    
    public function definition()
    {
        $sex = ['male','female'];

        $religion = ['islam','kristen','buddha','katolik','hindu','konghucu'];

        return [
            'name' => $this->faker->name,
            'birth_place' => $this->faker->city,
            'birth_date' => date('Y-m-d'),
            'sex' => $sex[rand(0,1)],
            'religion' => $religion[rand(0,5)],
            'address' => $this->faker->address,
        ];
    }
}
