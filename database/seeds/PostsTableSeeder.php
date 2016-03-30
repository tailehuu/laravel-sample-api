<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            $post = new Post();
            $post->title = 'Title ' . $i;
            $post->body = 'Body ' . $i;
            $post->save();
        }
    }
}
