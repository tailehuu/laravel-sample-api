<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

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
