<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create();
    }

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = \App\Models\User::where('is_admin', false)->get();

        $chapter1 = Chapter::create([
            'name' => 'Les structures de contrôle',
            'order' => 1,
        ]);

        $this->addExercices($chapter1, $users);
    }

    protected function addExercices(Chapter $chapter, $users)
    {
        $this->addAdditionExercice($chapter, $users);
        $this->addSubstractionExercice($chapter, $users);
    }

    protected function addAdditionExercice(Chapter $chapter, $users)
    {
        $ex1 = $chapter->exercises()->create([
            'name' => 'Addition',
            'order' => 1,
        ]);

        $variation = $ex1->variations()->create([
            'statement' => 'Additionner 2 nombres',
            'order' => 1,
            'class' => \App\Exercices\Chapters\StructuresDeControle\Exo1::class,
            'method' => 'addition',
        ]);

        $param1 = $variation->parameters()->create([
            'name' => 'x',
            'order' => 1,
        ]);

        $param2 = $variation->parameters()->create([
            'name' => 'y',
            'order' => 1,
        ]);

        foreach ($users as $user) {
            $paramValue1 = $param1->parameterValues()->create([
                'value' => $this->faker->randomNumber(),
            ]);

            $paramValue2 = $param2->parameterValues()->create([
                'value' => $this->faker->randomNumber(),
            ]);

            $result = $variation->results()->create([
                'user_id' => $user->id,
                'order' => 1,
                'expected' => $variation->class::{$variation->method}($paramValue1->value, $paramValue2->value),
            ]);

            for ($i = 0; $i < random_int(0, 5); ++$i) {
                $result->resultValues()->create([
                    'actual' => $this->faker->randomNumber(),
                ]);
            }

            $result->resultValues()->create([
                'actual' => $result->expected,
                'is_correct' => true,
            ]);
        }
    }

    protected function addSubstractionExercice(Chapter $chapter, $users)
    {
        $ex1 = $chapter->exercises()->create([
            'name' => 'Soustraction',
            'order' => 2,
        ]);

        $variation = $ex1->variations()->create([
            'statement' => 'Soustraire 2 nombres',
            'order' => 1,
            'class' => \App\Exercices\Chapters\StructuresDeControle\Exo1::class,
            'method' => 'substraction',
        ]);

        $param1 = $variation->parameters()->create([
            'name' => 'x',
            'order' => 1,
        ]);

        $param2 = $variation->parameters()->create([
            'name' => 'y',
            'order' => 1,
        ]);

        foreach ($users as $user) {
            $paramValue1 = $param1->parameterValues()->create([
                'value' => $this->faker->randomNumber(),
            ]);

            $paramValue2 = $param2->parameterValues()->create([
                'value' => $this->faker->randomNumber(),
            ]);

            $result = $variation->results()->create([
                'user_id' => $user->id,
                'order' => 1,
                'expected' => $variation->class::{$variation->method}($paramValue1->value, $paramValue2->value),
            ]);

            for ($i = 0; $i < random_int(0, 5); ++$i) {
                $result->resultValues()->create([
                    'actual' => $this->faker->randomNumber(),
                ]);
            }

            $result->resultValues()->create([
                'actual' => $result->expected,
                'is_correct' => true,
            ]);
        }
    }
}
