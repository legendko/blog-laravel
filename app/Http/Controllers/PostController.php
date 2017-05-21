<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DateTime;
use DateTimeZone;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBY('id', 'desc')->paginate(5);        
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
           'title'          => 'required|max:191',
           'body'           => 'required',
           'category_id'    => 'required|integer',
           'featured_image'    => 'sometimes|image'
        ));
        
        $post = new Post();
        
        $post->title = $request->title;
        $post->body = Purifier::clean($request->body);
        $post->category_id = $request->category_id;
        $post->slug = str_slug($post->title, '-');
        $today = getdate();
        $post->slug .= -$today[0];
        
        //image upload
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path("images/$filename");
            Image::make($image)->resize(800,400)->save($location);
            
            $post->image = $filename;
        }
        
        $post->save();
        
        $post->tags()->sync($request->tags, false);
        
        Session::flash('success', 'The blog post was successfully posted!');
        
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $dateCreate = new DateTime($post->created_at);
        $dateUpdate = new DateTime($post->updated_at);
        return view('posts.show')->with(['post' => $post, 'dateCreate' => $dateCreate, 'dateUpdate' => $dateUpdate]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
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
        $this->validate($request, array(
           'title'          => 'required|max:191',
           'body'           => 'required',
           'category_id'    => 'required|integer',
           'featured_image'    => 'sometimes|image'
        ));
        
        $post = Post::find($id); 
        if($post->title == $request->input('title')) {
            $post->body = Purifier::clean($request->input('body'));
            $post->category_id = $request->input('category_id');
        } else {
            $post->title = $request->input('title');
            $post->body = Purifier::clean($request->input('body'));
            $post->category_id = $request->input('category_id');
            $post->slug = str_slug($post->title, '-');
            $today = getdate();
            $post->slug .= -$today[0];
        }
        
        if ($request->hasFile('featured_image')) {
            //add new image
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path("images/$filename");
            Image::make($image)->resize(800,400)->save($location);
            $oldfile = $post->image;
            
            //update database
            $post->image = $filename;
            
            //delete old image
            Storage::delete($oldfile);
            
        }
        
        $post->update();
        
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags, true);
        } else {
            $post->tags()->sync(array());
        }
        Session::flash('success', 'This post was successfully saved!');
        
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        
        $post->delete();
        
        Session::flash('success', 'The post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}
