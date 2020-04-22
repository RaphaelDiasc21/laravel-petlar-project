<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Imagem;
use App\Services\ValidationFormService;

class PostController extends Controller
{
    public function index()
    {   
        return view('posts/post-form');
    }

    public function registroPost(Request $request)
    {   
        $postService = new \App\Services\PostsService();
        $post = $postService->createPost($request);
        return redirect("/".$post->tipo);
    }
}
