<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{

    public function getAllPosts(){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        return $response->json();
    }

    public function getPost($id=3) {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/3');
        return $response->json();
    }

    public function addPost() {
        $post = HTTP::post('https://jsonplaceholder.typicode.com/posts', [
            'userId' => 1,
            "title" => 'Laravel CommerceShop',
            "body" => "Hello Ecommerceshop from Laravel"
        ]);

        return $post->json();
    }

    public function updatePost() {
        $put = HTTP::put('https://jsonplaceholder.typicode.com/posts/1', [
            'title'=> "updated title",
            'body'=> "Updated by Bruce"
        ]);

        return $put->json();
    }

    public function deletePost($id=1) {
        $response = Http::delete('https://jsonplaceholder.typicode.com/posts/1'.$id);
        return $response->json();
    }
    
}
