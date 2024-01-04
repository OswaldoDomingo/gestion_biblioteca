<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'title' => 'El señor de los anillos',
            'published_year' => 1954,
        ]);
        DB::table('books')->insert([
            'title' => 'El hobbit',
            'published_year' => 1937,
        ]);
        DB::table('books')->insert([
            'title' => 'Cancion de hielo y fuego',
            'published_year' => 1996,
        ]);
        DB::table('books')->insert([
            'title' => 'El nombre del viento',
            'published_year' => 2007,
        ]);
    }
}
