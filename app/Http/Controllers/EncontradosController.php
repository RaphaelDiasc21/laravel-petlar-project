<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\PostsService;

class EncontradosController extends Controller
{
    public function index(PostsService $postService,Request $request)
    {
        $posts = $postService->getPosts($request, 'Encontrados');
        return view('posts-encontrados', compact('posts'));
    }

    public function filterPosts(Request $request)
    {
        $postsService = new PostsService();
        $posts = $postsService->filterPost($request->input('animal'),$request->input('cidade'), 'Encontrados',$request);
        return view('posts-encontrados', compact('posts'));
    }
}
