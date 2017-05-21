<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class BlogController extends Controller
{
    public function getIndex() {
        $posts = Post::paginate(5);
        
        return view('blog.index')->withPosts($posts);
    }
    
    public function getSingle($slug) {
        $post = Post::where('slug', '=', $slug)->first();
        $post_id = $post->id;
        $comments = Comment::where('post_id', '=', $post_id)->orderBy('created_at', 'desc')->get();
        return view('blog.single')->withPost($post)->withComments($comments);
    }
}
