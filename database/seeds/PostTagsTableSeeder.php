<?php

use App\Post;
use App\PostTag;
use App\Tag;
use Illuminate\Database\Seeder;

class PostTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $tags = Tag::all();

        foreach ($posts as $post) {
            $post_tag = new PostTag();
            $post_tag->post_id = $post->id;
            $post_tag->tag_id = rand(1, 5);
            $post_tag->save();

            $post_tag = new PostTag();
            $post_tag->post_id = $post->id;
            $post_tag->tag_id = rand(6, $tags->count());
            $post_tag->save();
        }
    }
}
