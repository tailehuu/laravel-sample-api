<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class WelcomeController extends Controller
{
    public function index()
    {
        $tags_id = [3, 7];
        $posts = Post::getPostsByTags($tags_id);

        return view('welcome');
    }
}
