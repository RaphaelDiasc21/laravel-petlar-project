<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Services\PostsService;
class PerdidosController extends Controller
{
    public function index(PostsService $postsService, Request $request)
    {
        $posts = $postsService->getPosts($request,'Perdidos');
        return view('posts-perdidos', compact('posts'));
    }

    public function filterPosts(Request $request)
    {
        $postsService = new PostsService();
        $posts = $postsService->filterPost($request->input('animal'),$request->input('cidade'), 'Perdidos',$request);
        return view('posts-perdidos', compact('posts'));
    }
}
