<?php

    namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use App\Post;

class PostsService
    {
        public function createPost(Request $request)
        {   
            ValidationFormService::postValidation($request);
            $post = new Post();
            $post->titulo = $request->input("titulo");
            $post->descricao = $request->input("descricao");
            $post->tipo = $request->input("tipo");
            $post->animal = $request->input("animal");
            $post->cidade = $request->input("cidade");
            $post->user_id = $request->input("user_id");

            $photos_arr = []; 
            
            foreach($request->file('foto') as $foto){
                
                $photo_uploaded = \Cloudinary\Uploader::upload($foto);

                $url = $photo_uploaded["secure_url"];
                
                $image_address = $this->getMainAddress($url);
                array_push($photos_arr,$image_address);
            }

            $images = implode(',',$photos_arr);

            $post->images = $images;

            $post->save();
            
            return $post;
        }

        private function getMainAddress($url)
        {
            $upload_picture_url_pos = strpos(strtolower($url), 'upload', 0);
            return substr($url,($upload_picture_url_pos + strlen('upload')));
        }

        public function filterPost($animal,$cidade,$tipo, Request $request)
        {
            $sql = "SELECT u.nome, u.email,
            p.titulo, p.tipo, p.cidade, p.descricao, p.animal,p.id
            FROM usuarios u
            INNER JOIN posts p 
            ON p.user_id = u.id 
            WHERE p.tipo = ? AND cidade = ? AND  animal = ?";

            $posts = DB::select( DB::raw($sql),[$tipo,$cidade,$animal]);

            //$paginator = $this->getPaginacao($posts,$request);
            //return $paginator;
        }

        public function getPosts(Request $request, $tipo)
        {       
                $posts =  DB::table('posts')
                ->join('usuarios','posts.user_id','=','usuarios.id')
                ->select('posts.id','posts.titulo','posts.tipo','posts.cidade','posts.descricao','posts.animal','posts.images','usuarios.nome','usuarios.email')
                ->where('posts.tipo',$tipo)
                ->paginate(9); // Buscando os models postss


                foreach($posts as &$post){
                    $post->images = explode(",",$post->images);
                }
                return $posts; // Retorno o mesmo
        }
    }