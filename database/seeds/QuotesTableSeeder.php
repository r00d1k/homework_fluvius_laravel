<?php

use Illuminate\Database\Seeder;

class QuotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = \App\Author::all();

        $author->each(function($author) {
            factory(\App\Quote::class, 10)->create([
                'author_id' => $author->id,
            ]);
        });
    }
}
