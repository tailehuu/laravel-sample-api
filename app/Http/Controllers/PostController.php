<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostTag;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;

class PostController extends JsonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return $this->responseJson('success', $posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());



        // send an email to admin
        $data = array(
            'title' => $post->title,
            'body' => $post->body
        );
        Mail::send('emails.createPost', $data, function($message) use ($data)
        {
            $message->to(env('ADMIN_EMAIL_ADDRESS'))->subject('Post created');
        });

        return $this->responseJson('success', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return $this->responseJson('success', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return $this->responseJson('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        Log::info('Deleted post id ' . $id);
        $this->responseJson('success');
    }

    /**
     * Add tag or tags to post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addTagsToPost(Request $request, $id) {
        $tags_id = $request->get('tags_id');
        foreach($tags_id as $tag_id) {
            // check tag is exist
            if(PostTag::where('post_id', $id)->where('tag_id', $tag_id)->count() == 0) {
                $postTag = new PostTag();
                $postTag->post_id = $id;
                $postTag->tag_id = $tag_id;
                $postTag->save();
            }
        }
        $post = Post::findOrFail($id)->load('tags');

        return $this->responseJson('success', $post);
    }

    /**
     * Get posts by tag or tags.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPostsByTags(Request $request) {
        $tags_id = $request->get('tags_id');
        $posts = Post::getPostsByTags($tags_id);
        return $this->responseJson('success', $posts);
    }

    /**
     * Count posts by tag or tags.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function countPostsByTags(Request $request) {
        $tags_id = $request->get('tags_id');
        $posts = Post::getPostsByTags($tags_id);
        return $this->responseJson('success', count($posts));
    }
}
