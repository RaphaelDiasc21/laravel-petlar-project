<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\PostsService;

class AdocoesController extends Controller
{
    public function index(PostsService $postService,Request $request)
    {
        $posts = $postService->getPosts($request,'adocoes');
                return view('posts/posts',['posts'=>$posts,'tipo'=>'adocoes']);
    }

    public function filterPosts(Request $request)
    {
        $postsService = new PostsService();
        $posts = $postsService->filterPost($request->input('animal'),$request->input('cidade'), 'Adocoes',$request);
                return view('posts/posts',['posts'=>$posts,'tipo'=>'adocoes']);
    }
}
