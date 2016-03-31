<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // enable mass assignment
    protected $fillable = [
        'title',
        'body'
    ];

    protected $hidden = ['pivot'];

    /**
     * The tags that belong to the post.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tags');
    }

    /**
     * Get posts by tags
     */
    public static function getPostsByTags($tags_id) {
        $tags = Tag::find($tags_id);

        $posts = [];
        foreach($tags as $tag) {
            $ps = $tag->posts()->get();
            foreach($ps as $p) {
                if (!in_array($p, $posts)) {
                    array_push($posts, $p);
                }
            }
        }

        return array_unique($posts);
    }
}
