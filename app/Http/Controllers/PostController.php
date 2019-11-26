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
        return view('post-form');
    }

    public function registroPost(Request $request)
    {   
        ValidationFormService::postValidation($request);
        $post = new Post();
        $post->titulo = $request->input("titulo");
        $post->descricao = $request->input("descricao");
        $post->tipo = $request->input("tipo");
        $post->animal = $request->input("animal");
        $post->cidade = $request->input("cidade");
        $post->user_id = $request->input("user_id");

            $post->save();  
            
            foreach($request->file('foto') as $foto){
                $post_imagem = new Imagem();
               
                $imagem_upada = \Cloudinary\Uploader::upload($foto);

                $post_imagem->url = $imagem_upada["secure_url"];
                $post_imagem->post_id = $post->id;

                $post_imagem->save();
                
            }

            if($post->tipo == "adocoes"){
                return redirect()->route('posts.adocoes');
            }else if($post->tipo == "perdidos"){
                return redirect()->route('posts.perdidos');
            }else{
                return redirect()->route('posts.encontrados');
            }
    }
}
