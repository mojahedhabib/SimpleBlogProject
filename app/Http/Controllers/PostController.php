<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Purifier;
use Image;





class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(8);
        return view('posts.index')->with('posts', $posts);
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
        return view('posts.create')->with('categories', $categories)->withTags($tags);
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
            'title' => 'required|min:10|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|integer',
            'body' => 'required|min:100|max:10000'
        ));

        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request->body);

        //save image
        if($request->hasFile('post-image')) {
            $image = $request->file('post-image');
            $filename =  time() . '.' . $image->getClientOriginalExtension();

            $location = public_path('images/'.$filename);

            Image::make($image)->resize(1000, 400)->save($location);

            $post->image = $filename;
        }


        $post->save();
       // $tag =Tag::find($request->tags);
        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The blog post is successfully saved');

        return redirect()->route('post.index');
       // return redirect()->route('post.show',$post->id);
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
        $tags = Tag::find($id);
        return view('posts.show',  ['post'=>$post])->with('category', Category::find($id))
            ->with('tags', $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save it as var
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        $tagids= [];

        foreach ($post->tags as $post_tag) {
            $tagids[] = $post_tag->id;
        }

        //$cats = array();
       // foreach ($categories as $category) {
      //       $cats[$category->id] = $category->name;
       // }

        //return to the view and pass in the var we previously created
        return view('posts.edit', compact('post','categories', 'tagids', 'tags'));
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
        //validate the data\
        $post = Post::find($id);
        if ($request->input ('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|min:10|max:255',
                'body' => 'required|min:100|max:10000'
            ));
        }
        else {
            $this->validate($request, array(
                'title' => 'required|min:10|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'category_id' => 'required',
                'body' => 'required|min:100|max:10000'
            ));
        }


        //save the data to the database
        $post = Post::find($id);

      //  $post->update($request->all());
       // $post->title()->sync($request->input('title', []));
       // $post->body()->sync($request->input('body', []));

        $post->title = $request->get('title');
        $post->slug = $request->get('slug');
        $post->category_id = $request->get('category_id');
        $post->body = $request->get('body');

        $post->save();

        $post->tags()->sync($request->tags);

        //redirect with flash data to posts.show
        Session::flash('success', 'The blog post is successfully updated');
       // return view('posts.show',  ['post'=>$post]);
        return redirect()->route('post.show', $post->id);
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

        $post->delete();

        Session::flash('success', 'The blog post is successfully deleted');
        return redirect()->route('post.index');
    }
}
