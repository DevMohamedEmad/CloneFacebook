<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id' , 'DESC')->get();
        return view('posts.index')->with('posts' , $posts);
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('posts.trashed')->with('posts' , $posts);
    }

    public function create()
    {
        $tags =Tag::all();
        if($tags->count() == 0){
           return  redirect()->route('tag.create');
        }
        return view('posts.create')->with('tags' , $tags);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'tags'=>'required',
            'photo'=>'required|image'
        ]);
        $photo = $this->savePhoto($request['photo']);
        $post = Post::create([
            'user_id'=> Auth::id(),
            'title'=> $request['title'],
            'content'=> $request['content'],
            'photo'=>  $photo,
            'slug'=> str_slug($request['title'])
        ]);
        $post->tag()->attach($request['tags']);
        return redirect()->back()->with('success' , "Post Added Successfully");
    }

    public function show($slug)
    {
        $tags =Tag::all();
        $post = Post::where('slug' , $slug)->first();
        return view('posts.show' , compact('post'))->with('tags' , $tags);
    }

    public function edit($id)
    {
        $tags =Tag::all();
        $post = Post::where('id' , $id)->where('user_id' , Auth::id())->first();
        if($post === null){
            return redirect()->back()->with('success' , "You Don't Have Permission To Edit This Post!");
        }
         return view('posts.edit' , compact('post'))->with('tags' , $tags);
    }

    public function update(Request $request , $id)
    {
        $post = Post::find($id);
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required'
        ]);
        if($request->has('photo')){
            $post->photo =  $this->savePhoto($request['photo']);
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        $post->tag()->sync($request['tags']);
        return redirect()->back()->with('success' , "Post Updated Successfully");

    }

    public function destroy($id)
    {
        $post = Post::where('id' , $id)->where('user_id' , Auth::id())->first();
        if($post === null){
            return redirect()->back()->with('success' , "You Don't Have Permission To Delete This Post!");
        }
        $post->delete($id);
        return redirect()->back();
    }

    public function hdelete($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->back()->with('success' , "Post Restore Successfully");
    }

    public function savePhoto($photo)
    {

        $newPhoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/posts/photos',$newPhoto);
        return 'uploads/posts/photos/'.$newPhoto;
    }

}
