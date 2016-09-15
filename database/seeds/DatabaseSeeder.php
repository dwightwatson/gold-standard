<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment('production')) {
            exit('Unable to seed in production.');
        }

        $this->call(PostsTableSeeder::class);
    }
}
