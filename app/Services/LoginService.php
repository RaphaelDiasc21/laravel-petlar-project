<?php

    namespace App\Services;
    use Illuminate\Support\Facades\Hash;
    use App\Usuario;

    class LoginService 
    {
        public function logarUsuario($email,$senha){
            $usuario = Usuario::where('email',$email)->first();
         
            if($usuario != null){
                if(Hash::check($senha, $usuario->senha)){
                    session(['key'=>session()->getId(), 'nome'=>$usuario->nome, 'id'=>$usuario->id]);
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }   
    }