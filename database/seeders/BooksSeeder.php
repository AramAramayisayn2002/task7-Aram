<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Book_author;
use Illuminate\Database\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i=0; $i<10; ++$i) {
            Book::create([
                'title' => 'Example ' . $i,
                'description' => 'Description ' . $i,
                'publication_year' => 2000 + $i
            ]);
        }
    }
}
