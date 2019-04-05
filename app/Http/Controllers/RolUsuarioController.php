<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;

class RolUsuarioController extends Controller
{
		public function __construct(){
				//
		}

		// Imprime los usuarios con cierto rol
		public function index($rol_id){
			$rol = Rol::find($rol_id);
			if(!$rol)
				return $this->responder_error('No se pudo encontrar rol con el id dado', 404);

			$usuarios = $rol->usuarios;
			return $this->responder($usuarios, 200);
		}

}
