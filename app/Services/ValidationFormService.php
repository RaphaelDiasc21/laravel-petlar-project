<?php

    namespace App\Services;

use Illuminate\Http\Request;

class ValidationFormService
    {
        public static function registerFormValidation(Request $request)
        {
            $request->validate([
                'nome' => 'required',
                'email' => 'required|unique:usuarios|email',
                'senha' => 'required|confirmed|min:6'
            ],
            [
                'nome.required' => 'Por favor, digite seu nome para podermos o identificar da melhor forma',
                'email.required' => 'Por favor, Entre com um endereço de email',
                'email.email' => 'Por favor, entre com um endereço de email valido',
                'email.unique' => 'Pedimos desculpa, email informado ja está em uso',
                'senha.required' => 'Digite uma senha no campo senha',
                'senha.confirmed' => 'As senhas informadas não combinam no campo confirmição !',
                'senha.min' => 'A senha deve conter no mínimo 6 caracteres'
            ]);
    }
    
    public static function postValidation(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'tipo' => 'required',
            'animal' => 'required',
            'foto' => 'required|array|max:3',
            'foto.*' => 'required|mimes:jpg,png,jpeg'
        ],
        [
            'titulo.required' => 'Por favor, coloque um titulo em seu post para os usuários poder identificar da melhor maneira',
            'descricao.required' => 'Deixe uma descrição em para seu post',
            'tipo.required' => 'A classificação do tipo de post é obrigatória !',
            'animal.required' => 'Selecione o(s) animal no qual esse post é direcionado !',
            'foto.required' => 'Por favor, pedimos ao menos uma foto do animalzinho !',
            'foto.max' => 'Aceitamos no máximo 3 fotos !',
            'foto.*.mimes' => 'Pedimos que o formato das fotos sejam jpg, png ou jpeg !'
        ]);
    }
}