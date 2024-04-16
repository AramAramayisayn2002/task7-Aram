<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\AuthorBook;
use Illuminate\Database\Seeder;

class AuthorBookSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; ++$i) {
            AuthorBook::create([
                'author_id' => rand(1, 18),
                'book_id' => rand(1, 10)
            ]);
        }
    }
}
