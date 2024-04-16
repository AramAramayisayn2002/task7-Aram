<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorsSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i=0; $i<18; ++$i) {
            Author::create([
                'first_name' => 'First name ' . $i,
                'last_name' => 'Last name ' . $i,
                'biography' => 'Biography ' . $i
            ]);
        }
    }
}
