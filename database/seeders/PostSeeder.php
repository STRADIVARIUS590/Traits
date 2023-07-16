<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Introduccion a React JS',
            'body' => 'En este episodio veremos los fundamentos de la proramacion en el framework de React JS',
            'user_id' => User::inRandomOrder()->limit(1)->first()->id
        ]);
        Post::create([
            'title' => 'Temas selectos de PHP',
            'body' => 'Trucos y guias de la programacion en php que resultan utiles',
            'user_id' => User::inRandomOrder()->limit(1)->first()->id
        ]);
    }
}
