<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = User::All();
        $usuarios->each(function($autor) {
            Post::factory()->count(3)->create(['autor_id' => $autor->id]);
        });
    }
}
