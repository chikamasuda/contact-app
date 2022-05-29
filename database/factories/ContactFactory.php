<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Contact;

class ContactFactory extends Factory
{
    protected $model = Contact::class;
    /**
     * Define the model's default state.
     *˙
     * @return array
     */
    public function definition()
    {
        return [
            'fullname'      => $this->faker->name,
            'gender'        => $this->faker->numberBetween($min = 1, $max = 2),
            'email'         => $this->faker->unique()->safeEmail,
            'postcode'      => $this->faker->regexify('/^[0-9]{3}-[0-9]{4}$/'),
            'address'       => $this->faker->address,
            'building_name' => $this->faker->realText(10),
            'opinion'       => $this->faker->realText(40)
        ];
    }
}
