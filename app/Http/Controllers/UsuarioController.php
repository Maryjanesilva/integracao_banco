<?php

namespace App\Http\Controllers;

use App\Service\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $UsuarioService;

    public function __construct(UsuarioService $novoUsuarioService)
    {
        $this->UsuarioService = $novoUsuarioService;
    }
    public function store(Request $request){
   $user = $this->UsuarioService->create( $request->all());
   return $user;
    }
}
