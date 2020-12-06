<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        return view('post.index',compact('posts'));
    }
    public function create(){
        return view('post.created');
    }

    public function store(Request $request){
        $data=$request->except('_token');
        $data['slug']   =   Str::slug($request->name);
        $data['created_at'] =  Carbon::now('Asia/Ho_Chi_Minh');

        $id=Post::insertGetId($data);

        if($id){
            return redirect()->back()->with('message','created success !');
        }
    }

    public function edit($id){
        $post = Post::findOrfail($id);
        return view('post.update',compact('post'));
    }

    public function update(Request $request, $id){
        $post = Post::findOrfail($id);
        $data = $request->except('_token');
        $data['name'] = $request->name;
        $data['title'] = $request->title;
        $data['content'] = $request->content;
        $data['updated_at'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['slug'] = Str::slug($request->name);

        $update = $post->update($data);
        return redirect()->back()->with('message','update success !');
    }


    public function delete($id){
        $post = Post::findOrfail($id);
        if($post) $post->delete() ;
        return redirect()->back()->with('message','delete success !');
    }
}
