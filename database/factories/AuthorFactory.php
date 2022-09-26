<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
        ];
    }

    $factory->afterCreating(App\Models\Author::class, function($author, $faker) {
        $author->profile()->save(App\Models\Profile::class->make());
    })
}
