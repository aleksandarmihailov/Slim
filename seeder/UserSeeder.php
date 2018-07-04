<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Svetlana',
                'surname' => 'Mitkovska',
                'age' => 1
            ],
            [
                'name' => 'Daniela',
                'surname' => 'Nikolovska',
                'age' => 1
            ],
            [
                'name' => 'Vladimir',
                'surname' => 'Gjurcevski',
                'age' => 1
            ],
            [
                'name' => 'Aleksandar',
                'surname' => 'Mihailov',
                'age' => 1
            ],
            [
                'name' => 'Zorana',
                'surname' => 'Naumova',
                'age' => 1
            ],
            [
                'name' => 'Mirko',
                'surname' => 'Todorov',
                'age' => 1
            ],
            [
                'name' => 'Zoran',
                'surname' => 'Todorovski',
                'age' => 1
            ]
        ];

        $table = $this->table('user');
        $table->insert($data);
        $table->save();
    }
}
