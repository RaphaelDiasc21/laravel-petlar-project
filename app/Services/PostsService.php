<?php

    namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;


class PostsService
    {
        public function filterPost($animal,$cidade,$tipo, Request $request)
        {
            $sql = "SELECT u.nome, u.email,
            p.titulo, p.tipo, p.cidade, p.descricao, p.animal,p.id
            FROM usuarios u
            INNER JOIN posts p 
            ON p.user_id = u.id 
            WHERE p.tipo = ? AND cidade = ? AND  animal = ?";

            $posts = DB::select( DB::raw($sql),[$tipo,$cidade,$animal]);

            $paginator = $this->getPaginacao($posts,$request);
            return $paginator;
        }

        public function getPosts(Request $request, $tipo)
        {
                $sql = "SELECT u.nome, u.email,
                p.titulo, p.tipo, p.cidade, p.descricao, p.animal,p.id
                FROM usuarios u
                INNER JOIN posts p 
                ON p.user_id = u.id 
                WHERE p.tipo = ?";

                $posts = DB::select( DB::raw($sql),[$tipo]); // Buscando os models postss

                $paginator = $this->getPaginacao($posts, $request);
                return $paginator; // Retorno o mesmo
        }

        public function getPaginacao($posts, Request $request)
        {
            $posts_finais = []; // Inicializando variavel que irá receber os posts com finais, Bindando com as respectivas fotos

            foreach($posts as $post){

                $posts_images = DB::select( DB::raw("SELECT url FROM images where post_id = ?"),[$post->id]);
                $post_array = (array) $post; // Transformo o Objeto post em um array para adicionar a propriedade de fotos
                $post_array["images_url"] = (array) $posts_images; // Atribuo o array de url das fotos a uma nova chave do array trnaformado

                $post = (object) $post_array; // Cast do array post para um objeto post
                array_push($posts_finais,$post); // Adiciona na variavel
            
            }// Recebendo as fotos, ligando com os posts

            $posts_finais_collection = collect($posts_finais); // Cast do array de posts convertidos para uma collection Laravel
            $page = $request->input('page',1); // Recebo qual página está sendo requerida no cliente
            $chunk = $posts_finais_collection->forPage($page,10)->all(); //  Gero uma página baseada na collection (Laravel faz isso behind the scenes)
            $paginator = new LengthAwarePaginator($chunk,count($posts_finais),10, $page); // Instancio um objeto lenghtAwarePaginator

            return $paginator;
        }
    }