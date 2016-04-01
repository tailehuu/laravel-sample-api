<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    /**
     * Get all posts.
     *
     * Check json structure only
     *
     * @return void
     */
    public function testGetPosts()
    {
        $this->get('/post')->seeJsonStructure([
            'status',
            'data'
        ]);
    }

    /**
     * Create a post.
     *
     * Check json structure only
     *
     * @return void
     */
    public function testCreatePost()
    {
        $this->json('POST', '/post', ['title' => 'New post', 'body' => 'This is my body.'])
            ->seeJsonStructure([
                'status',
                'data' => [
                    'id',
                    'title',
                    'body',
                    'created_at',
                    'updated_at'
                ]
            ]);
    }
}
