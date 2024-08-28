<?php

namespace App\Service;

use App\Models\Usuario;
use GuzzleHttp\Psr7\Request;

class UsuarioService
{
  public function create(array $dados)
  {
    $user = Usuario::create([
      'nome' => $dados['nome'],
      'email' => $dados['email'],
      'password' => $dados['password']
    ]);
    return $user;
  }
  public function update( array $dados)
  {
     $usuario=Usuario ::find($dados['id']);
     if ($usuario == null){
      return [
        'status' => false,
        'message'=> 'usuario nao encontrado'
      ];
     }
    
     if (isset($dados['nome'])){
     $usuario->nome = $dados ['nome'];
     }
     if (isset($dados['email'])){
     $usuario->email =$dados['email'];
     }
     if (isset($dados['password'])){
     $usuario->password= $dados ['password'];
     }

     $usuario ->save();
     return [
      'status'=> true,
      'message'=> 'atualizado com sucesso'
     ];
  }
  public function delete($id)
  {
    $usuario= Usuario::find($id);
    if ($usuario == null){
      return[
        'sataus'=> false,
        'message'=>'usuario nao encontrado'
      ];
    }
    $usuario->delete($id);
    return [
      'status' => true ,
     'message'=> 'usuario excluido com sucesso'
    ];
  }
  
  public function findById($id)
  {
    $usuario = Usuario::find($id);

    return [
      'status' => true,
      'menssagem' => 'usuario encontrado',
      'data' => $usuario
    ];

    return [
      'status' => false,
      'menssagem' => 'usuario não encontrado'
    ];
  }
  public function getAll()
  {
    $usuarios = Usuario::all();
    return[
      'status' => true,
      'message' => 'usuario encontrado',
      'data' =>$usuarios
    ];
  }


  public function searchByName($nome)
  {
    $usuarios = Usuario::where('nome', 'like', '%' . $nome . '%')->get();
    if ($usuarios->isEmpty()) {
      return [
        'status' => false,
        'message' => 'sem Resultados'
      ];
    }

    return [
      'status' => true,
      'message' => 'Resultado Encontrados',
      'data' => $usuarios
    ];
  }

  public function searchByEmail($email)

  {
    $usuarios = Usuario::where('email', 'like', '%' . $email . '%')->get();
    if ($usuarios->isEmpty()) {
      return [
        'status' => false,
        'message' => 'sem resultado',
      ];
    }
    return [
      'status' => true,
      'message' => 'Resultado Encontrados',
      'data' => $usuarios
    ];
  }

}
