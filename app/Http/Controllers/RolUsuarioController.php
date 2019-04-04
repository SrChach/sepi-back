<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;
use App\Usuario;

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

		public function store($rol_id, $usuario_id){
			// Buscamos si existen las tablas relacionadas
			$rol = Rol::find($rol_id);
			if(!$rol)
				return $this->responder_error('El rol no existe', 404);
			
			$usuario = Usuario::find($usuario_id);
			if(!$usuario)
				return $this->responder_error('El usuario no existe', 404);
				
			// si el usuario tiene el rol, no lo actualizamos
			if( $usuario->rol_id == $rol_id ) 
				return $this->responder_error('El usuario ya se tiene ese Rol', 409);

			$usuario->rol_id = $rol_id;
			$usuario->save();
			return $this->responder("El usuario $usuario_id ha sido agregado al rol $rol_id", 201);
		}

		// destroy va? Lo dejamos sin rol alguno?

}
