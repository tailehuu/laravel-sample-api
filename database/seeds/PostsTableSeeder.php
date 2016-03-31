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
        $posts = array(
            array(
                'title'=>'PHP',
                'body' => 'PHP is a server-side scripting language designed for web development but also used as a general-purpose programming language.'
            ),
            array(
                'title'=>'HTML',
                'body' => 'HyperText Markup Language, commonly referred to as HTML, is the standard markup language used to create web pages.'
            ),
            array(
                'title'=>'JavaScript',
                'body' => 'JavaScript is the programming language of HTML and the Web. Programming makes computers do what you want them to do. JavaScript is easy to learn.'
            ),
            array(
                'title'=>'CSS',
                'body' => 'Cascading Style Sheets (CSS) are a stylesheet language used to describe the presentation of a document written in HTML or XML (including XML dialects like SVG or XHTML). CSS describes how elements should be rendered on screen, on paper, in speech, or on other media.'
            ),
            array(
                'title'=>'Java',
                'body' => 'Java is a general-purpose computer programming language that is concurrent, class-based, object-oriented,[13] and specifically designed to have as few implementation dependencies as possible.'
            )
        );
        foreach ($posts as $p) {
            $post = new Post();
            $post->title = $p['title'];
            $post->body = $p['body'];
            $post->save();
        }
    }
}
