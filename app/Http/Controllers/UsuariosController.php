<?php

namespace App\Http\Controllers;

use App\Services\CloudinaryConfigService;
use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Hash;
use App\Services\LoginService;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Services\ValidationFormService;

class UsuariosController extends Controller
{
    public function registrarUsuario()
    {
        return view('usuarios-registrar');
    }

    public function registrar(Request $request)
    {
        ValidationFormService::registerFormValidation($request);
        
        $nome = $request->input('nome');
        $email = $request->input('email');
        $senha =  Hash::make($request->input('senha'), [
            'rounds' => 12
        ]);

        Usuario::create(["nome"=> $nome, "email"=>$email, "senha"=> $senha]);

        return redirect()->route('usuarios.registrar');
    }

    public function loginUsuario(Request $request, LoginService $login)
    {
            $result = $login->logarUsuario($request->input('email'), $request->input('senha'));

            if($result){
                return redirect()->route('main');
            }else{
                $request->session()->flash('erro_login','Credenciais fornecidas estão erradas !');
                return redirect()->route('usuario.logar');
            }
    }

    public function login()
    {
        return view('login');
    }

    public function deslogar()
    {
        Session::flush();
        return redirect()->route('main');
    }

    public function postsUsuario()
    {
        $posts = DB::select(DB::raw("SELECT u.nome, u.email,
                                    p.titulo, p.tipo, p.cidade, p.descricao, p.animal, p.id,
                                    i.url
                                    FROM usuarios u
                                    INNER JOIN posts p 
                                    ON p.user_id = u.id 
                                    INNER JOIN 
                                    images i ON i.post_id = p.id
                                    WHERE p.user_id = ?"),
                                    [Session::get("id")]);
        return view('posts-usuario', compact('posts'));
    }

    public function deletePost($id, CloudinaryConfigService $cs)
    {
        $images = DB::table('images')->where('post_id', $id)->get();

        foreach($images as $image){
            \Cloudinary\Uploader::destroy($image->url);
            $image->delete();
        }
        \App\Post::destroy($id);
    
        return redirect()->route('posts.usuario');
    }
}
