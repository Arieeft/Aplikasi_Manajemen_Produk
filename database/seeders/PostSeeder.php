<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            //
        ]);
        
        // \App\Models\Post::factory(10)->create();

        // \App\Models\Post::factory()->create([
        //     'image' => 'Test User',
        //     'title' => 'test@example.com',
        //     'content' => 'Coba'
        // ]);
    }
}
