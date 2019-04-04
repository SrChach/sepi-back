<?php

namespace App\Http\Controllers;

use App\Usuario;

class UsuarioController extends Controller
{
		public function __construct(){
				//
		}

		public function index(){
			$usuarios = Usuario::all();
			return $this->responder($usuarios, 200);
		}

		public function show($id){
			$usuario = Usuario::find($id);

			if($usuario)
				return $this->responder($usuario, 200);
			return $this->responder_error('usuario no encontrado', 404);
		}

}
