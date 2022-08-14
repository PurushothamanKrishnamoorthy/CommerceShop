<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getAllPost() {
        $posts = DB::table('post')->get();
        return view('post', compact('posts'));
    }

    public function add() {
        return view("add-post");
    }

    public function createPost(Request $request) {
        $post = DB::table('post')->insert([
            'title'=>$request->title,
            'body' => $request->body
        ]);
        return back()->with('post_created', 'post has been created successfully');
    }

    public function getById($id) {
        $post = DB::table('post')->where('id', $id)->first();
        return view('single-post', compact('post'));
    }

    public function delete($id) {
        $post = DB::table('post')->where('id', $id)->delete();
        return back()->with('post_deleted', 'post has been created successfully');
    }

    public function editPost($id) {
        $post = DB::table('post')->where('id', $id)->first();
       return view('edit-post', compact('post'));
    }

    public function updatePost(Request $request) {
        $post = DB::table('post')->where('id', $request->id)
        ->update(['title'=> $request->title,'body'=>$request->body]);
        return back()->with('post_updated', 'post has been updated successfully');
    }
}
