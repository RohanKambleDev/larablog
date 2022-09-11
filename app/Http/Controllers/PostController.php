<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Services\Post as PostService;

class PostController extends Controller
{
    protected $post = '';

    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostService $postService)
    {

        dd(app());
        // $comments = Comment::all();
        // foreach ($comments as $comment) {
        //     // if ($comment->post_id == 1) {
        //     dd($comment, $comment->post());
        //     // }
        // }

        // exit;
        // $posts = Cache::remember('post.all', now()->addSeconds(60), function () {
        //     // $posts = Post::all();
        //     return Post::all()->toArray();
        // });
        // $posts = Post::all();
        // foreach ($posts as $post) {
        //     dd($post->comment());
        // }
        $posts = Post::all()->toArray();
        // cache()->forget('post.all');
        // dd($posts->titleToUpper());
        return view('post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', Post::class);
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request, Post $post, PostService $postService)
    {
        // dd(app());
        $this->authorize('create', Post::class);
        // $requestData = $request->validated();
        // if ($request->hasFile('postImage')) {
        //     $filePath = $request->postImage->store('post', 'public');
        //     $requestData['image'] = $filePath;
        // }
        // $requestData['created_by'] = Auth::user()->id;
        // if ($post->add($requestData)) {
        //     return redirect()->route('post.index')->with('success', 'Post added successfully');
        // }

        // $requestData = $request->validated();

        // $postService = new PostService();
        $status = $postService->save($request, $post);

        if ($status) {
            // return redirect()->route('post.index')->with('success', 'Post added successfully');
            return to_route('post.index')->with('success', 'Post added successfully');
        } else {
            return redirect()->route('post.index')->with('success', 'Failed to add Post, Please try again later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('edit', $post);
        return view('post.edit', ['post' => $post])->with('success', 'Post updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->authorize('update', $post);
        $requestData = $request->validated();
        if ($post->update($requestData)) {
            return redirect()->route('post.show', $post->slug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return redirect()->route('post.index');
        }
    }
}
