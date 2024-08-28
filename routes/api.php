<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Attribute\Route as AttributeRoute;

Route::post('/usuario', [UsuarioController::class,'store' ]);

Route::get('/usuario/{id}/find',[UsuarioController::class,'findById']);

Route::get('/Usuario',[UsuarioController::class,'index']);

Route::get('/Usuario/search',[UsuarioController::class,'searchByName']);

Route::get('/Usuario/search/email',[UsuarioController::class,'searchByEmail']);

Route::delete('/usuario/{id}/delete',[UsuarioController::class,'delete']);

Route::put('/usuario',[UsuarioController::class, 'update']);
