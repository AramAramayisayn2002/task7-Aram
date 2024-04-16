<?php

namespace Database\Seeders;

use App\Models\AuthorBook;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            AuthorsSeeder::class,
            BooksSeeder::class,
            AuthorBookSeeder::class
        ]);
    }
}
