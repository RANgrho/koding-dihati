<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('/post', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Comment $comment)
    {
        $this->validate($request, array(
            'post_id' => 'required',
            'comment' => 'required',
            'user_id' => 'required',
        ));

        
        $post = Post::FindOrFail($request->post_id);
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->post()->associate($post);
        
        $comment->save();
        //return 'success';
        return redirect()->route('post.show', $comment->post_id)->with('success', 'Jawaban berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        $comments = Comment::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {        
        return view('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'post_id' => 'required',
            'comment' => 'required',
            'user_id' => 'required',
        ]);

        $comment->update($request->all());
        return redirect()->route('post.show', $comment->post_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('post.show', $comment->post_id);
    }
}
