<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;

class CommentsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => 'store']);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, [
           'name' => 'required|max:191', 
           'email' => 'required|email|max:191',
           'comment' => 'required|min:5|max:2000'
        ]);
        
        $post = Post::find($post_id);
        
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post_id = $post->id;
        
        $comment->save();
        
        Session::flash('success', 'Comment added!');
        
        return redirect()->route('blog.single', [$post->slug]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
           'comment' => 'required'
        ]);
        
        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->update();
        
        Session::flash('success', 'Comment updated!');
        
        return redirect()->route('posts.show', $comment->post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        
        $comment->delete();
        
        Session::flash('success', 'The comment was successfully deleted!');
        return redirect()->route('posts.show', $comment->post->id);
    }
}
