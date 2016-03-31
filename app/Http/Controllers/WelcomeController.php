<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class WelcomeController extends JsonController
{
    public function index()
    {
        $tags_id = [3, 7];
        $posts = Post::getPostsByTags($tags_id);

        return $this->responseJson('success', $posts);
    }
}
